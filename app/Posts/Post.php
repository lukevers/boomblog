<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Get a list of all published posts.
     *
     * @return Post
     */
    public static function published()
    {
        return self::where('published', '=', true)->get();
    }

    /**
     * Get a list of all drafts.
     *
     * @return Post
     */
    public static function drafts()
    {
        return self::where('published', '=', false)->get();
    }
}
