@extends('layouts.admin')

@section('content')
<header class="py-3">
    <div class="container d-flex align-items-center justify-content-center">
        <h1>Project Details</h1>
    </div>
</header>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
         @if (Str::startsWith($project->cover_image , 'https://'))
            <img loading="lazy" class="img-fluid" width="300" src="{{$project->cover_image}}" alt="{{$project->name}}" >
        @else
         <img loading="lazy" class="img-fluid" width="300" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}" >
        
        @endif
        </div>
        <div class="col">
            <h3 class="text-muted">
                {{$project->name}}
            </h3>
            <p>
                {{$project->description}}
            </p>
            <div class="links">
                <a class="btn btn-secondary" role="button" href="{{$project->source_code_url}}" target="__blank">
                Source Code 
               </a>
               <a class="btn btn-secondary" role="button" href="{{$project->project_url}}" target="__blank">
                Preview
               </a>
               <a class="btn btn-secondary" role="button" href="{{route('admin.projects.index')}}">
                Go Back
               </a>
            </div>
        </div>
    </div>
</div>
@endsection