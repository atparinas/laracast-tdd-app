<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function addTask($body)
    {
        /**
         * compact('body') similar to ['body' => $body]
         */
        // return $this->tasks()->create(compact('body'));


        $task = $this->tasks()->create(compact('body'));

        return $task;


    }

    public function recordActivity($activity)
    {
        // Activity::create([
        //     'project_id' => $this->id,
        //     'description' => $activity
        // ]);

        /**
         * since the Project have relationship with the activity
         * the above code can be refactor
         */

         $this->activity()->create(['description' => $activity ]);
    }
}
