<div class="row">
    <div class="col-md-8">
        <div class="page-header">
            <h1>Comments </h1>
        </div>
        <div class="comments-list">
            @foreach($comments as $comment)
                <div class="media">
                    <div class="media-body">
                        <a href="users/{{$comment->user->id}}">
                            {{$comment->user->first_name}} {{$comment->user->last_name}} - {{$comment->user->email}} <small>commented on {{$comment->created_at}}</small>
                        </a>

                        <h4>{{$comment->body}}</h4>
                        <p class="text-danger">{{$comment->url}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>