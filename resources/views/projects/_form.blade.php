
<div class="mb-5">
    <label class="input-label" for="title">Project Title</label>
    <input type="text" name="title" id="title" class="input-text" required value="{{$project->title}}">
</div>
<div class="mb-5">
    <label class="input-label" for="description">Project Description</label>
    <textarea class="input-text" required
        name="description" id="desctiption"  rows="10" class="form-control">{{$project->description}}</textarea>
</div>
<div class="form-group">
    <button type="submit" 
        class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded">
        {{$buttonText}}
    </button>
    <a class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded"
        href="{{$project->path()}}">Cancel</a>
</div>