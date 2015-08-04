<?php

namespace App\Http\Controllers\PublicController;

use Storage as Storage_;
use Illuminate\Http\Request;

class Storage extends \App\Http\Controllers\Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle GET requests
     *
     * @return resource
     */
    public function get(Request $request, $path = null)
    {
        if (is_null($path))
        {
            return abort(404);
        }

        $type = explode('.', $path)[1];
        return response(Storage_::get($path))->header('Content-Type', "image/$type");
    }
}
