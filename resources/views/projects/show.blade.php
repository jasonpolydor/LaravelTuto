@extends('layouts.app')

@section('content')
    <div class="col-sm-9 col-md-9 col-lg-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{ $project->name }}</h1>
            <p class="lead">{{$project->description}}</p>
            {{--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>--}}

            <br/>
            <div class="row container-fluid">
            <form method="post" action="{{route('comments.store')}}">
                {{ csrf_field() }}

                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">


                <div class="form-group">
                    <label for="comment-content">Comment</label>
                    <textarea placeholder="Enter comment"
                              id="comment-content"
                              name="body"
                              rows="3"
                              spellcheck="false"
                              class="form-control autosize-target text-left"
                    >
                        </textarea>
                </div>

                <div class="form-group">
                    <label for="url-content">Proof of work done (Url/Photos) </label>
                    <textarea placeholder="Enter url or screenshots"
                              id="url-content"
                              name="url"
                              rows="2"
                              spellcheck="false"
                              class="form-control autosize-target text-left"
                    >
                        </textarea>
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
            </div>
        </div>

        @include('partials.comments')

    </div>
    <div class="col-sm-3  col-md-3 col-lg-3 pull-right">
        {{--<div class="sidebar-module sidebar-module-inset">--}}
            {{--<h4>About</h4>--}}
            {{--<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
        {{--</div>--}}
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
                <li><a href="/projects">List of projects</a></li>
                <br/>
                <li>
                    <a
                        href="#"
                        onclick="
                        let result = confirm('Are you  sure you want to delete this Project?');
                        if(result){
                            event.preventDefault();
                            document.getElementById('delete-form').submit();
                        }
                        "
                    >
                        Delete
                    </a>
                    <form method="post" id="delete-form" action="{{ route('projects.destroy', [$project->id]) }}"
                          style="display: none;"
                    >
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </li>
                {{--<li><a href="#">Add new member</a></li>--}}
            </ol>
        </div>

        {{--<div class="sidebar-module">--}}
            {{--<h4>Members</h4>--}}
            {{--<ol class="list-unstyled">--}}
                {{--@foreach($project->users as $user)--}}
                {{--<li><a href="#">{{ $user->name }}</a></li>--}}
                {{--@endforeach--}}
            {{--</ol>--}}
        {{--</div>--}}
    </div>

@endsection