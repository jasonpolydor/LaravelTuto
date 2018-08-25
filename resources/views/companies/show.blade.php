@extends('layouts.app')

@section('content')
    <div class="col-sm-9 col-md-9 col-lg-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{ $company->name }}</h1>
            <p class="lead">{{$company->description}}</p>
            {{--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>--}}
        </div>

        <!-- Example row of columns -->
        <div class="row">
            @foreach($company->projects as $project)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>{{ $project->name }}</h2>
                    <p>{{ $project->description }}</p>
                    <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-3  col-md-3 col-lg-3 pull-right">
        {{--<div class="sidebar-module sidebar-module-inset">--}}
            {{--<h4>About</h4>--}}
            {{--<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
        {{--</div>--}}
        <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
                <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
                <li><a href="/projects/create">Add Project</a></li>
                <li><a href="/companies">List of companies</a></li>
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
                    <form method="post" id="delete-form" action="{{ route('companies.destroy', [$company->id]) }}"
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
                {{--@foreach($company->users as $user)--}}
                {{--<li><a href="#">{{ $user->name }}</a></li>--}}
                {{--@endforeach--}}
            {{--</ol>--}}
        {{--</div>--}}
    </div>

@endsection