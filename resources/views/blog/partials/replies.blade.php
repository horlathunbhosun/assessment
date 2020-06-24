@foreach($comments as $comment)
<div class="comment-body padding-10">
    <ul class="comments-list">

        <li class="comment-item">
            <div class="comment-heading clearfix">
             <div class="comment-author-meta">
                    <h4>{{ $comment->user->name }}</h4>
                </div>
            </div>
            <div class="comment-content">
                <p>{{ $comment->body}}</p>
            </div>
        </li>
    </ul>
</div>
@endforeach
