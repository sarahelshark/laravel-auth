@extends('layouts.admin')

@section('content')

<header class="py-3 ">
    <div class="container d-flex justify-content-between">
        <h1>Edit {{$project->name}}</h1>
        <a class="btn btn-secondary" role="button" href="{{route('admin.projects.index')}}">
            Go Back
           </a>
    </div>
</header>

<div class="container">

@include('partials.errors') 

     <form action="{{route('admin.projects.update', $project)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="name"
                aria-describedby="nameHelper"
                placeholder="New project name"
                value="{{old('name', $project->name)}}"
            />
            <small id="nameHelper" class="form-text text-muted">type a name for your project</small>

            @error('name')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Project Type</label>
            <select class="form-select" name="type_id" id="type_id">
                <option selected disabled>Select one</option>
                
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id',$project->type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            @foreach ($technologies as $technology)

                    <div class="form-check">
                       @if($errors->any()) 
                        <input class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technologies-{{$technology->id}}" name="technologies[]"{{in_array( $technology->id , old('technologies',[]) ) ? 'checked' : ''  }} />

                        @else

                        <input class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technologies-{{$technology->id}}" name="technologies[]" {{
                            $project->technologies->contains($technology) ? 'checked' : ' '
                        }} />

                        @endif


                        <label class="form-check-label" for="technologies-{{$technology->id}}"> {{$technology->name}}</label>
                       
                    </div>
             @endforeach      
            </div>


        <div class="mb-3 d-flex gap-4 ">
            @if (Str::startsWith($project->cover_image , 'https://'))
            <img loading="lazy" width="200" src="{{$project->cover_image}}" alt="{{$project->name}}" >
          @else
         <img loading="lazy" width="200" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}" >
        
        @endif


            <div>
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
                value="{{old('project_url', $project->project_url)}}"
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
                value="{{old('source_code_url', $project->source_code_url)}}"
            />
            <small id="sourceHelper" class="form-text text-muted">type link to source code of your project</small>
            @error('source_code_url')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" value="{{old('description', $project->description)}}"> {{old('description', $project->description)}} </textarea>

            @error('description')
             <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <button
            type="submit"
            class="btn btn-dark"
        >
            Update!
        </button>
        
        
     </form>
     
</div>

@endsection