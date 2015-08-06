<?php

namespace App\Http\Controllers\PublicController;

use Illuminate\Http\Request;
use App\Posts\Post;
use App\Posts\Tag;
use Feed;
use URL;

class Controller extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Index Page
     *
     * @return view
     */
    public function getIndex()
    {
        return view('public.posts')->withPosts(Post::published());
    }

    /**
     * Tag Page
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $tag
     * @return view
     */
    public function getTag(Request $request, $tag = null)
    {
        if (is_null($tag))
        {
            return abort(404);
        }

        return view('public.posts')->withPosts(Tag::posts($tag));
    }

    /**
     * RSS Feed
     *
     */
    public function getRss(Request $request)
    {
        $feed  = Feed::make();
        $posts = Post::published()->take(20);

        // TODO:
        // GET VALUES FROM SETTINGS

        $feed->title = 'title';
        $feed->description = 'desc';
        $feed->logo = URL::to('image');
        $feed->link = URL::to('rss');
        $feed->lang = 'en';
        $feed->pubdate = $posts[0]->published_at;

        foreach($posts as $post)
        {
            $feed->add($post->title, $post->author, URL::to($post->slug), $post->published_at, $post->body, $post->body);
        }

        return $feed->render('atom');
    }

    /**
     * Default GET Route
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $title
     * @return view
     */
    public function get(Request $request, $title = null)
    {
        if (is_null($title))
        {
            // This probably won't ever happen, but who let's be sure.
            return abort(404);
        }

        $post = Post::findByTitleSlug($title);
        if (is_null($post))
        {
            return abort(404);
        }

        return view('public.posts')->withPosts([$post])
            ->withSingle(true);
    }
}
