@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-9">
            <article class="post-item post-detail">
                <div class="post-item-image">
                    <a href="#">
                        <img src="/img/{{ $posts->image}}" height="300" alt="">
                    </a>
                </div>

                <div class="post-item-body">
                    <div class="padding-10">
                        <h1>{{ $posts->title}}</h1>

                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="#"> {{ $posts->author->name}}</a></li>

                            </ul>
                        </div>

                        <p>{{ $posts->content}}</p>

                    </div>
                </div>
            </article>

            <article class="post-comments">
                <h3> Comments</h3>

                @include('blog.partials.replies', ['comments' => $posts->comments, 'post_id' => $posts->id])
                @if (Auth::check())
                <div class="comment-footer padding-10">
                    <h3>Leave a comment</h3>
                    <form method="POST" action="{{ route('com.store') }}">
                        @csrf
                        <div class="form-group required">
                            <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                            <label for="comment">Comment</label>
                            <textarea name="body" rows="6" class="form-control" required></textarea>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <input type="submit" class="btn btn-lg btn-success"value="Submit" />

                            </div>
                            <div class="pull-right">
                                <p class="text-muted">
                                    <span class="required">*</span>
                                    <em>Indicates required fields</em>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                @endif


            </article>
        </div>
           </div>
</div>

@endsection
