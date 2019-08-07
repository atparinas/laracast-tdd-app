@extends('layouts.app')


@section('content')

    <div class="container">
        <h1>Create New Project</h1>

        <form action="/projects" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Project Description</label>
                <textarea name="description" id="desctiption"  rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Create Project</button>
                <a href="/projects">Cancel</a>
            </div>
        </form>
    </div>
    
@endsection
