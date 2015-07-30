<?php

namespace App\Http\Controllers\DashboardController;

use Illuminate\Http\Request;

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
     * New Post Page
     *
     * @return view
     */
    public function getNew()
    {
        return view('dashboard.new-post');
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
