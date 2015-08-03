<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Posts\Post;
use App\Posts\PostTag;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Posts
     *
     * @param  string $tag
     * @return []App\Posts\Post
     */
    public static function posts($tag = null)
    {
        if (is_null($tag))
        {
            return abort(404);
        }

        $posts = [];
        $id    = self::where('name', '=', $tag)->first();

        if (is_null($id))
        {
            return abort(404);
        }

        $id = $id->id;
        $ptag  = PostTag::where('tag', '=', $id)->get();

        foreach($ptag as $p)
        {
            array_push($posts, $p->getPost);
        }

        usort($posts, function($a, $b) {
            return strtotime($b->published_at) - strtotime($a->published_at);
        });

        return $posts;
    }
}
