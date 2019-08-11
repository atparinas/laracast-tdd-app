<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    
    public function index()
    {
        // $projects = Project::all();

        /**
         * Instead of showing all project
         * only show projects created by the authenticated user
         */
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {

        if(auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));

    }

    public function create()
    {
        $project = new Project();

        return view('projects.create', compact('project'));
    }

    public function store()
    {
        //Validations
        $attributes = $this->validateRequest();

        $project = auth()->user()->projects()->create($attributes);;

        return redirect($project->path());
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {

        $this->authorize('update', $project);

        $attributes = $this->validateRequest();

        $project->update($attributes);

        return redirect($project->path());
        
    }

    protected function validateRequest()
    {
        $attributes = request()->validate([
            'title'=>'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'nullable'
        ]);

        return $attributes;
    }
}
