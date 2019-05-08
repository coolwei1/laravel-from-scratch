<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
use Mail;

class Project extends Model
{
    protected $guarded = [];

//    protected static function boot()
//    {
//        parent::boot();
//
//        // using model hook
//        // downside: looking at the store function in controller, we dont know email will be sent after create new project
//        // the email sending procedure is hidden in here which will confuse if not understand well.
//        static::created(function ($project){
//        Mail::to($project->owner->email)->send(
//            new ProjectCreated($project)
//        );
//    });
//    }

    protected $dispatchesEvents = [
        'created' => \App\Events\ProjectCreated::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);

//        return Task::create([
//            'project_id' => $this->id,
//            'description' => $description
//        ]);
    }
}
