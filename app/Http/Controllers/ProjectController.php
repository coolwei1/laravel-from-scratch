<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreated;
use Illuminate\Http\Request;
use App\Project;
use Mail;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('auth')->only(['store', 'update']);
//        $this->middleware('auth')->except(['store', 'update']);
    }

    public function index()
    {
        // the first '\' indicate start from root directory
//        $project = \App\Project::all();

//        $projects = Project::all();

//        auth()->id();
//        auth()->user();
//        auth()->check();
//        auth()->guest();

//        $projects = Project::where('owner_id', auth()->id())->get(); // not readable
//        $projects = Project::where('owner_id', auth()->id())->take(1)->get();

        $projects = auth()->user()->projects;

        // to perform some very time consuming database operation that are not required update everytime
        // can cache it for faster response
//        cache()->rememberForever('stats', function (){
//            return ['lesson' => 3000, 'hours' => 50];
//        });
//
//        dump($projects);

        return view('projects.index', compact('projects'));
    }

//    public function show($id){
    public function show(Project $project)
    {
//        if($project->owner_id !== auth()->id()){
//            abort(403);
//        }

//        abort_if($project->owner_id !== auth()->id(), 403);

//        abort_unless(auth()->user()->owns($project), 403);

//        $this->authorize('update', $project);

//        if(\Gate::denies('update', $project)){
//            abort(403);
//        }

//        abort_if(\Gate::denies('update', $project), 403);

//        abort_unless(\Gate::allows('update', $project), 403);

//        auth()->user()->can('update', $project);

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

//        $validated = request()->validate([
//           'title' => ['required', 'min:3', 'max:255'],
//           'description' => ['required', 'min:3']
//        ]);
        $validated = $this->validateProject();

        $validated['owner_id'] = auth()->id();

        $project = Project::create($validated);
//        Project::create($validated);

//        event(new ProjectCreated($project));

//        dump($project);

//        Project::create($validated + ['owner_id' => auth()->id()]);

//        Mail::to($project->owner->email)->send(
//            new ProjectCreated($project)
//        );

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

//        $this->authorize('update', $project);
//        $validated = request()->validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'description' => ['required', 'min:3']
//        ]);
//
//        $project->update($validated);

        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
//        $this->authorize('update', $project);


        $project->delete();

        return redirect('/projects');
    }

    public function validateProject(){
        return request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
        ]);
    }
}
