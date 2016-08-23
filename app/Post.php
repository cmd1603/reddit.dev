<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected static $posts;

    public static $rules = array(
            'title' => 'required|max:100',
            'url' => 'required',
            'content' => 'required'
            );

    public function author()
    {
        //SELECT * FROM users WHERE id = $post->created_by
        return $this->belongsTo(User::class, 'created_by');
    }


}
