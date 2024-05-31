@extends('layouts.admin')

@section('content')

<header class="py-3">
    <div class="container">
        <h1>New Project</h1>
    </div>
</header>

<div class="container">

@include('partials.errors') 

     <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                aria-describedby="nameHelper"
                placeholder="New project name"
            />
            <small id="nameHelper" class="form-text text-muted">type a name for your project</small>

            @error('name')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="type_id" class="form-label">Project Type</label>
            <select
                class="form-select"
                name="type_id"
                id="type_id"
            >
                <option selected disabled>Select one</option>
                
                @foreach ($types as $type)
                 <option value="{{$type->id}}"
                    {{ old('type_id') == $type->id ? 'selected' : '' }}
                    >
                    {{$type->name}}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input
                type="file"
                class="form-control"
                name="cover_image"
                id="cover_image"
                aria-describedby="coverImageHelper"
                placeholder=""
            />
            <small id="coverImageHelper" class="form-text text-muted">upload your cover image</small>

            @error('cover_image')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="project_url" class="form-label">Project URL</label>
            <input
                type="text"
                class="form-control"
                name="project_url"
                id="project_url"
                aria-describedby="urlHelper"
                placeholder="https://"
                value="{{old('project_url')}}"
            />
            <small id="urlHelper" class="form-text text-muted">type a url for your project</small>

            @error('project_url')
             <div class="text-danger">{{$message}}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="source_code_url" class="form-label">Source Code URL</label>
            <input
                type="text"
                class="form-control"
                name="source_code_url"
                id="source_code_url"
                aria-describedby="sourceHelper"
                placeholder="New project source code URL"
                value="{{old('source_code_url')}}"
            />
            <small id="sourceHelper" class="form-text text-muted">type link to source code of your project</small>
            @error('source_code_url')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" value="{{old('description')}}"></textarea>

            @error('description')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <button
            type="submit"
            class="btn btn-dark"
        >
            Create!
        </button>
        
     </form>
     
</div>

@endsection