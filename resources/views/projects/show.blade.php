@extends('layouts.app')

@section('content')
    <div class="container">
            <h1>{{ $project->title }}</h1>
            <a href="/projects">Back to Project List</a>
            <p>
                {{ $project->description }}
            </p>
    </div>
@endsection


