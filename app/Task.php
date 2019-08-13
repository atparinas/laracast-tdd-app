<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    /**
     * Update the parent element whent the child element (Task)
     * is updated
     */
    protected $touches = ['project'];

    protected static function boot()
    {
        parent::boot();

        static::created(function($task){
            $task->project->recordActivity('task_created');
        });

        static::updated(function($task){
            $task->project->recordActivity('task_status_updated');            
        });
    }


    public function project()
    {
       return $this->belongsTo(Project::class);
    }


    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }
}
