@extends('layouts.app')

@section('content')
    <header class="flex items-center">
        <h2 class="mr-auto text-gray-700 text-base font-normal">My Project</h2>
        <a  href="/projects/create" 
            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded shadow">New Project</a>
    </header>
    <div class="flex flex-wrap pt-4 -mx-3">
        @forelse ($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div class="bg-white rounded-lg shadow p-5 h-20" style="height:200px;">
                    <h2 class="font-normal text-xl py-3 -ml-5 border-l-4 border-blue-300 pl-4 mb-3">
                        <a href="{{ $project->path() }}"> {{ $project->title }} </a>
                    </h2>
                    <div class="text-gray-600"> {{str_limit($project->description,80) }} </div>
                </div>
            </div>

        @empty
            <div>
                No Projects Yet
            </div>
        @endforelse
    </div>
    
@endsection

