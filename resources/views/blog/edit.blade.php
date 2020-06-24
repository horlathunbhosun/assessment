@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Post</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('update', $post->id) }}" enctype="multipart/form-data">

                        <div class="form-group">

                            @csrf

                            <label class="label">Post Title: </label>

                            <input type="text" value="{{ $post->title}}" name="title" class="form-control" required/>

                        </div>

                        <div class="form-group">

                            <label class="label">Post Content: </label>

                            <textarea name="content" value="" rows="10" cols="30" class="form-control" required>{{ $post->content }}</textarea>

                        </div>

                        <div class="form-group">

                            <img src="/img/{{ $post->image}}" height="50" width="50" alt="">
                            <br/><br/>

                            <label class="label">Post Image </label>

                            <input type="file"  name="image" class="file-control">
                        </div>


                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value="Post" />

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
