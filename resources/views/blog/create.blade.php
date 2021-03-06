@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create Post</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('save') }}" enctype="multipart/form-data">

                        <div class="form-group">

                            @csrf

                            <label class="label">Post Title: </label>

                            <input type="text" name="title" class="form-control" required/>

                        </div>

                        <div class="form-group">

                            <label class="label">Post Content: </label>

                            <textarea name="content" rows="10" cols="30" class="form-control" required></textarea>

                        </div>

                        <div class="form-group">

                            <label class="label">Post Image </label>

                            <input type="file" name="image" class="file-control">
                        </div>

                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value="Value" />

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
