<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //

    protected $fillable = ['title' , 'slug' , 'author_id' , 'content' , 'image'];
    public function author(){
        return  $this->belongsTo('App\User');
    }

    public function comments() {

        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
