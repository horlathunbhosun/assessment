<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];
    public function user(){

        return $this->belongsTo('App\User');

    }


    public function replies(){

        return $this->hasMany(Comment::class, 'parent_id');
    }
}
