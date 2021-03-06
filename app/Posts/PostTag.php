<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_tags';

    /**
     * Get the actual tag.
     *
     * @return App\Posts\Tag
     */
    public function get()
    {
        return $this->hasOne('App\Posts\Tag', 'id', 'tag');
    }

    /**
     * Get the post related to this post tag.
     *
     * @return App\Posts\Post
     */
    public function getPost()
    {
        return $this->belongsTo('App\Posts\Post', 'post', 'id');
    }
}
