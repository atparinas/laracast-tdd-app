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
        return view('projects.create');
    }

    public function store()
    {
        //Validations
        $attributes = request()->validate([
            'title'=>'required',
            'description' => 'required',
            // 'owner_id' => 'required'
        ]);

        // $attributes['owner_id'] = auth()->id();

        auth()->user()->projects()->create($attributes);

        return redirect('/projects');
    }
}
