@extends('layouts.app')



@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <h1>Manage Posts</h1>

            <a href="{{ url('create') }}" class="btn btn-success" style="float: right">Create Post</a>

            <table class="table table-bordered">

                <thead>

                    <th width="80px">Id</th>

                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th width="150px">Action</th>


                </thead>

                <tbody>

                @foreach($all as $post)

                <tr>

                    <td>{{ $post->id}}</td>

                    <td>{{ $post->title}}</td>
                    <td>{{ $post->content}}</td>
                    <td><img src="/img/{{ $post->image}}" height="50" width="50" alt=""></td>
                    <td>
                        <a href="{{ route('edit', $post->id)}}" class="alert alert info"> Edit</a>
                        {{-- <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">View Post</a> --}}

                    </td>

                </tr>

                @endforeach

                </tbody>



            </table>

        </div>

    </div>

</div>

@endsection
