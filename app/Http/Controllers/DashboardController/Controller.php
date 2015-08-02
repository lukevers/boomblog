<?php

namespace App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;
use App\Posts\Post;
use Auth;

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

    /**
     * Posts page handler.
     *
     * If the second parameter is empty then we view all posts.
     * If the second parameter is 'new' then we create a post.
     * If the second parameter is not empty we edit that post.
     *
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
            return view('dashboard.edit-post')->withPost(new Post);
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
        $post->meta_description = is_null($request['meta_description']) ? '' : $request['meta_description'];
        $post->body = is_null($request['body']) ? '' : $request['body'];
        $post->save();

        return $id === 'new' ? $post->id : 'success';
    }
}
