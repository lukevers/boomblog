<?php

namespace App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;
use App\Posts\Post;
use Input;
use Carbon;
use Auth;
use URL;

class Controller extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index Page
     *
     * @return view
     */
    public function getIndex()
    {
        return view('dashboard.index');
    }

    public function postUploadimage(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $filename = str_random(6) . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(storage_path() . '/app', $filename);

            return URL::to('/storage/' . $filename);
        }

        return abort(400);
    }

    /**
     * Posts page handler.
     *
     * If the second parameter is empty then we view all posts.
     * If the second parameter is 'new' then we create a post.
     * If the second parameter is not empty we edit that post.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  integer $id
     * @return view
     */
    public function getPosts(Request $request, $id = null)
    {
        if (is_null($id))
        {
            return view('dashboard.posts');
        }

        if ($id === 'new')
        {
            return view('dashboard.edit-post')->withPost(new Post)->withNew(true);
        }

        return view('dashboard.edit-post')->withPost(Post::find($id));
    }

    /**
     * New Post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPosts(Request $request, $id = 'new')
    {
        if ($id === 'new')
        {
            $post = new Post;
            $post->user = Auth::user()->id;
        }

        else
        {
            $post = Post::find($id);
        }

        $post->title = is_null($request['title']) ? '' : $request['title'];
        $post->body = is_null($request['body']) ? '' : $request['body'];
        $post->slug = str_slug('-', $post->title);
        $post->save();

        return $id === 'new' ? $post->id : 'success';
    }

    /**
     * Publish Post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string link to published post
     */
    public function patchPosts(Request $request, $id)
    {
        $post = Post::find($id);
        $post->published = true;
        $post->published_at = Carbon\Carbon::now()->toDateTimeString();
        $post->save();

        return '/' . $post->slug;
    }
}
