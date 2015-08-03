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
     * Find By Title Slug
     *
     * @param  string $slug
     * @return Post
     */
    public static function findByTitleSlug($slug = null)
    {
        if (is_null($slug))
        {
            return null;
        }

        return self::where('slug', '=', $slug)->first();
    }

    /**
     * Get a list of all published posts.
     *
     * @return Post
     */
    public static function published()
    {
        return self::where('published', '=', true)->orderBy('published_at', 'DESC')->get();
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

    /**
     * Get the author.
     *
     * @return App\User
     */
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'user');
    }

    /**
     * Get all of the tags related to this post.
     *
     * @return []App\Posts\PostTag
     */
    public function tags()
    {
        return $this->hasMany('App\Posts\PostTag', 'post', 'id');
    }
}
