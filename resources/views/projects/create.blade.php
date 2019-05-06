@extends('layout')

@section('content')
    <h1 class="title">Create a new projects</h1>
    <form method="post" action="/projects">
        {{ csrf_field() }}
        <div class="control">
            <input class="input {{$errors->has('title') ?  'is-danger' : ''}}" type="text" name="title" placeholder="Project Title" value="{{old('title')}}" required>
        </div>
        <div class="control">
            <textarea class="textarea {{$errors->has('description') ?  'is-danger' : ''}}" name="description" placeholder="Project Description" required>{{old('description')}}</textarea>
        </div>
        <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
        </div>

        @include('errors')
    </form>
@endsection