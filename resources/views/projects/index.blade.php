@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="flex items-center">
            <h1 class="mr-auto">Birdboard</h1>
            <a href="/projects/create">New Project</a>
        </div>
        <div class="flex">
            @forelse ($projects as $project)
                <div class="bg-white mr-4 rounded shadow">
                    <h3>{{ $project->title }}</h3>
                    <div> {{ $project->description }} </div>
                </div>

            @empty
                <div>
                    No Projects Yet
                </div>
            @endforelse
        </div>
    </div>
    
@endsection

