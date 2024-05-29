@extends('layouts.guest')

@section('content')

<div class="container">
   <div style="width: 200px">
      @if (Str::startsWith($project->cover_image , 'https://'))
                       <img loading="lazy" class="card-img-top "  src="{{$project->cover_image}}" alt="{{$project->name}}" >
                   @else
                      <img loading="lazy" class="card-img-top"  src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}" >
                           
                   @endif
   </div>
   <div>{{$project->name}}</div>
   <div>{{$project->description}}</div>
   
   <a class="btn btn-primary" href="{{$project->project_url}}" > preview</a>
   <a class="btn btn-primary" href="{{$project->source_code_url}}" > source code</a>
   <a class="btn btn-primary" href="{{route('guest.projects.index')}}" > see more projects</a>
</div>

@endsection