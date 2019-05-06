@extends('layout')

@section('content')
{{--useful when all people can view project but only few people can update--}}
{{--    @can('update', $project)--}}
{{--        <a href="">Update</a>--}}
{{--    @endcan--}}
    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>

    <h1 class="title">{{ $project->title }}</h1>
    <div class="content">{{ $project->description }}</div>
    <p>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </p>
    @if($project->tasks->count())
        <div class="box">
            @foreach($project->tasks as $task)
                <form method="post" action="/completed-task/{{ $task->id }}">
                    @if($task->completed)
                        @method('DELETE')
                    @endif
                    @csrf
                    <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                        <input type="checkbox" name="completed"
                               onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{$task->description}}
                    </label>
                </form>
            @endforeach
        </div>
    @endif

    <!-- add new task -->
    <form class="box" method="post" action="/projects/{{ $project->id }}/tasks">
        @csrf
        <div class="field">
            <label class="label" for="description">New task</label>

            <div class="control">
                <input type="text" name="description" placeholder="New Task" required>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

@endsection