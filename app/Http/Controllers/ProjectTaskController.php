<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        $attribute = request()->validate(['description' => 'required']);
        $project->addTask($attribute);

//        Task::create([
//            'project_id' => $project->id,
//            'description' => request('description')
//        ]);

        return back();
    }

    public function update(Task $task)
    {
//        $method = request()->has('completed') ? 'complete' : 'incomplete';
//        $task->$method();

//        request()->has('completed') ? $task->complete() : $task->incomplete();

//        if (request()->has('completed')) {
//            $task->complete();
//        } else {
//            $task->incomplete();
//        }

//        $task->complete(request()->has('completed'));

//        $task->update([
//            'completed' => request()->has('completed')
//        ]);

        return back();
    }
}
