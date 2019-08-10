@extends('layouts.app')


@section('content')


<div class="flex my-10">
        <div class="w-1/2 mx-auto">
            <div class="card px-5">
                <div class="mb-5">
                    <h1 class="text-2xl text-blue-500 font-bold">Edit Project</h1>
                </div>
                <form action="{{ $project->path() }}" method="POST" class="w-full py-5">
                    @csrf
                    @method('PATCH')
                    @include('projects._form', ['buttonText' => 'Create Project'])
                </form>
            </div>
        </div>
</div>
@endsection
