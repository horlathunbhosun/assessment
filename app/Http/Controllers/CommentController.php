<?php

namespace App\Http\Controllers;
// use Validator;
use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // public function store(Request $request)

    // {
    //     $this->validate($request,[
    //         'body'         => 'required'
    //     ]);
    //     $user = Auth::user()->id;
    //     $data =  $request->all();
    //     $data['user_id'] = $user;


    //     Comment::create($data);
    //     toastr()->success('Comment Submitted Successfully', 'Success');
    //     return back();

    // }


    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->body = $request->body;

        $comment->user()->associate($request->user());

        $blog = Blog::find($request->post_id);

        $blog->comments()->save($comment);
        toastr()->success('Comment Submitted Successfully', 'Success');
        return back();
    }


    public function reply(Request $request)
    {
        $reply = new Comment();

        $reply->body = $request->get('body');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Blog::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }

}
