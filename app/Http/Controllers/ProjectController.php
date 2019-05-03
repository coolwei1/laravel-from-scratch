<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // the first '\' indicate start from root directory
//        $project = \App\Project::all();
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

//    public function show($id){
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();

//        Project::create([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);

        $validated = request()->validate([
           'title' => ['required', 'min:3', 'max:255'],
           'description' => ['required', 'min:3']
        ]);

        Project::create($validated);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();

        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
