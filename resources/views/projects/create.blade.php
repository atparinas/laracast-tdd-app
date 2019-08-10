@extends('layouts.app')


@section('content')


<div class="flex my-10">
        <div class="w-1/2 mx-auto">
            <div class="card px-5">
                <div class="mb-5">
                    <h1 class="text-2xl text-blue-500 font-bold">Create New Project</h1>
                </div>
                <form action="/projects" method="POST" class="w-full py-5">
                    @csrf
                    @include('projects._form', ['buttonText' => 'Create Project'])
                </form>
                {{-- <form action="/projects" method="POST" class="w-full py-5">
                    @csrf
                    <div class="mb-5">
                        <h1 class="text-2xl text-blue-500 font-bold">Create New Project</h1>
                    </div>
                    <div class="mb-5">
                        <label class="input-label" for="title">Project Title</label>
                        <input type="text" name="title" id="title" class="input-text">
                    </div>
                    <div class="mb-5">
                        <label class="input-label" for="description">Project Description</label>
                        <textarea class="input-text"
                            name="description" id="desctiption"  rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" 
                            class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded">
                            Create Project
                        </button>
                        <a class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded"
                            href="/projects">Cancel</a>
                    </div>
                </form> --}}
            </div>
        </div>
</div>
@endsection
