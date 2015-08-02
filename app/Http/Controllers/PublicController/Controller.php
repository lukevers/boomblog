<?php

namespace App\Http\Controllers\PublicController;

use Illuminate\Http\Request;
use App\Posts\Post;

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
        return view('public.index');
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

        return view('public.post')->withPost($post);
    }
}
