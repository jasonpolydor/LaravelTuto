@extends('layouts.app')

@section('content')
    <div class="col-sm-9 col-md-9 col-lg-9 pull-left">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <form method="post" action="{{route('companies.update', [$company->id])}}">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="company-name">Name<span class="required">*</span></label>
                            <input placeholder="Enter Name"
                                   id="company-name"
                                   required
                                   name="name"
                                   spellcheck="false"
                                   class="form-control"
                                   value="{{ $company->name }}"
                            />
                        </div>

                        <div class="form-group">
                            <label for="company-content">Description</label>
                            <textarea placeholder="Enter Description"
                                   id="company-content"
                                   name="description"
                                   rows="5"
                                   spellcheck="false"
                                   class="form-control autosize-target text-left"
                            >
                                {{ $company->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                </form>

            </div>
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
                <li><a href="/companies/{{$company->id}}">View Company</a></li>
                <li><a href="/companies">List of Companies</a></li>
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