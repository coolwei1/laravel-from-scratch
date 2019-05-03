@extends('layout')

@section('content')
    <h1 class="title">Edit project</h1>
    <form method="post" action="/projects/{{$project->id}}" style="margin-bottom: 1em">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="field">
            <label class="label" for="title">Title</label>
        </div>
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
        </div>
        <div class="control">
            <textarea name="description" class="textarea">{{ $project->description }}</textarea>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>
    <form method="post" action="/projects/{{$project->id}}" style="display: inline">
        @csrf
        @method('DELETE')
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>
    </form>
@endsection