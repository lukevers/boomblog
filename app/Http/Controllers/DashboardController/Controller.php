<?php

namespace App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;
use App\Posts\Post;

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
    public function postNew(Request $request)
    {
        dd($request);
    }
}
