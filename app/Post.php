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

    public static function count($userId)
    {
        return Post::where('created_by', $userId)->count();
    }

    public static function findBySearch($searchBy, $search)
    {
        return Post::where($searchBy, 'LIKE', '%' . $search . '%');
    }

    public function author()
    {
        //SELECT * FROM users WHERE id = $post->created_by
        return $this->belongsTo(User::class, 'created_by');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function upvotes()
    {
        return $this->votes()->where('vote', '=', 1);
    }

    public function downvotes()
    {
        return $this->votes()->where('vote', '=', 0);
    }

    public function userVote($user)
    {
        return $this->hasMany(Vote::class)->where('user_id', '=', $user->id)->first();
    }

    public function voteScore()
    {
        $upvotes = $this->upvotes()->count();
        $downvotes = $this->downvotes()->count();
        return $upvotes - $downvotes;
    }


}
