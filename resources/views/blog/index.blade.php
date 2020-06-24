@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-2"></div>


    <div class="col-md-9">
        @foreach ($author as $post )
        <article class="post-item">
            <div class="post-item-image">
                <a href="post.html">
                    <img src="img/{{ $post->image }}" alt="" height="300" width="">
                </a>
            </div>
            <div class="post-item-body">
                <div class="padding-10">
                    <h2><a href="{{ route('blog', $post->slug)}}">{{ $post->title}}</a></h2>
                    <p>{{ str_limit($post->content, 300) }}</p>
                </div>

                <div class="post-meta padding-10 clearfix">
                    <div class="pull-left">
                        <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name}}</a></li>

                        </ul>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('blog', $post->slug)}}">Continue Reading &raquo;</a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach

        <nav>
            {{$author->links()}}

        </nav>
    </div>

</div>
@endsection
