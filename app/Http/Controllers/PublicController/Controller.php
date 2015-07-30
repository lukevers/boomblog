<?php

namespace App\Http\Controllers\PublicController;

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
}
