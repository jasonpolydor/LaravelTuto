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
                            {{$comment->user->first_name}} {{$comment->user->last_name}} - {{$comment->user->email}}
                        </a>

                        <p>{{$comment->body}}</p>
                        <p class="text-danger">{{$comment->url}}</p>
                        <p>commented on {{$comment->created_at}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>