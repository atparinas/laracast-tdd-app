@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-4">
        <h2 class="mr-auto text-gray-700 text-base font-normal">My Project</h2>
        <a  href="/projects/create" 
            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded shadow">New Project</a>
    </header>
    <div class="flex flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="w-1/3 px-3 pb-6">
           @include('projects._card', [
               'title' => $project->title,
               'description' => str_limit($project->description,80),
               'style'=>'height:200px;'
               ])
        </div>

        @empty
            <div>
                No Projects Yet
            </div>
        @endforelse
    </div>
    
@endsection

