<?php

namespace App\Http\Controllers\DashboardController;

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
}
