@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-4 py-4">
        <p class="mr-auto text-gray-700 text-sm font-normal">
           <a href="/projects">  My Project </a>/ {{ $project->title }}
        </p>
        <a  href="/projects/create" 
            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded shadow">New Project</a>
    </header>
    <div>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 mx-3 sm:mb-6">
                <div class="mb-6">
                    <h2 class="mr-auto text-gray-700 font-normal text-lg mb-3">Tasks</h2>
                    @foreach ($project->tasks as $task)
                        <form action="{{ $task->path() }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card mb-2">
                               <div class="flex items-center">
                                    <input type="text" name="body" class="w-full {{ $task->completed ? 'text-gray-500' : ''}} "
                                        value="{{ $task->body }}">
                                    <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                               </div>
                            </div>    
                        </form> 
                    @endforeach
                    <div class="card mb-2">
                        <form action="{{$project->path() . '/tasks' }}" method="post">
                                @csrf
                                <input type="text" name="body" id="body" placeholder="Begin Adding Task"
                                class="w-full">
                        </form>
                    </div>         
                </div>
                <div>
                    <h2 class="mr-auto text-gray-700 font-normal text-lg mb-3">General Notes</h2>
                    <textarea rows="10" class="card w-full"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut maxime adipisci totam? Dolorum ad 
                            cumque commodi assumenda, est, rem consequatur exercitationem similique mollitia neque dolor culpa 
                            rerum autem consequuntur nihil.</textarea>
                </div>
            </div>
            <div class="lg:w-1/4 mx-3">
                @include('projects._card', [
                    'title' => $project->title,
                    'description' => $project->description,
                    'style' => ''
                    ])
            </div>
        </div>
    </div>
@endsection


