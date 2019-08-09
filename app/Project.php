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

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function addTask($body)
    {
        /**
         * compact('body') similar to ['body' => $body]
         */
        return $this->tasks()->create(compact('body'));
    }
}
