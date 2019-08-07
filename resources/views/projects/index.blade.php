@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="flex items-center">
            <h1 class="mr-auto">Project List</h1>
            <a href="/projects/create">New Project</a>
        </div>
        <div class="flex pt-4">
            @forelse ($projects as $project)
                <div class="bg-white mr-4 rounded shadow w-1/3 p-5 h-20" style="height:200px;">
                    <h2 class="font-normal text-xl mb-4 py-2">{{ $project->title }}</h2>
                    <div class="text-gray-600"> {{str_limit($project->description,150) }} </div>
                </div>

            @empty
                <div>
                    No Projects Yet
                </div>
            @endforelse
        </div>
    </div>
    
@endsection

