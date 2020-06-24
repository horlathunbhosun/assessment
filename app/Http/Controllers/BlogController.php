<?php

namespace App\Http\Controllers;
use App\User;
use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   

    public function index(){
         $author = Blog::with('author')->simplePaginate(4);
        return view('blog.index', compact('author'));
    }


    public function show($slug){
        $posts = Blog::with('author')->where('slug',$slug)->first();
        return view('blog.show', compact('posts'));

    }



    public function lists(){
        $author = Auth::user()->id;
        $all = Blog::where('author_id', $author)->get();
        return view('blog.list', compact('all'));
    }

    public function create(){
        return view('blog.create');
    }


    public function edit($id){

        $post = Blog::findOrFail($id);
        return view('blog.edit', compact('post'));
    }



    public function update(Request $request, $id)
    {

        $post = Blog::findOrFail($id);

        $this->validate($request,[
            'title'         =>'required',
            'content'        =>'required',
        ]);
        $data =  $request->only(['title', 'slug', 'content','image', 'author_id']);
        if($request->hasFile('image')){
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = public_path().'/img';
        $success =  $file->move($path, $fileName);
        $data['image'] =  $fileName;

        }
        $author = Auth::user()->id;

        $data['author_id'] = $author;
        $title = $request->title;
        $slug = str_slug($title, '-');
        $data['slug'] = $slug;
        $confirm = $post->update($data);
        if($confirm)
        {
                toastr()->success('Blog Post Updated Successfully', 'Success');
                return redirect('/list');
        }
        else
        {
                toastr()->error('An error occurred while Updating the post', 'Error');
                return back();
        }



    }



    public function store(Request $request)
    {
            $this->validate($request,[
                'title'         =>'required',
                'content'          =>'required',
                'image'         => 'required'
            ]);

            $author = Auth::user()->id;
            $data =  $request->only(['title', 'slug', 'content','image', 'author_id']);
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $path = public_path().'/img';
                $file->move($path, $fileName);
                $data['image'] =  $fileName;
            }

            $title = $request->title;
            $slug = str_slug($title, '-');
            $data['slug'] = $slug;
            $data['author_id'] = $author;
            $post = new Blog($data);
            $confirm = $post->save();
             if($confirm)
             {
                toastr()->success('Blog Post Submitted Successfully', 'Success');
                return redirect('list');
              }
              else
              {
                    toastr()->error('An error occurred while submitting', 'Error');
                    return back();
              }
    }
}
