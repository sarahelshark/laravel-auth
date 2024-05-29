@extends('layouts.guest')

@section('content')
<div class="p-5 mb-4 bg-light  text-white" style="background-image:url({{asset('storage/'. $projects[2]->cover_image)}}); background-size:cover; filter:opacity(85%); background-repeat: no-repeat; background-position: center; ">
    <div class="container-fluid py-5" >
        <h1 class="display-5 fw-bold">Custom jumbotron</h1>
        <p class="col-md-8 fs-4">
            Using a series of utilities, you can create this jumbotron, just
            like the one in previous versions of Bootstrap. Check out the
            examples below for how you can remix and restyle it to your liking.
        </p>
       <a class="text-white" href="#projects">
        <button class="btn btn-dark btn-lg" type="button">go to projects</button>
       </a>
       
            
    </div>
   </div>

    <div id="projects" class="container py-3">
        <h1>All Projects for Guests</h1>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3  mt-4 g-4">
            @forelse ($projects as $project)
            <div class="col">
               <a href="{{route('guest.projects.show', $project)}}" class=" text-dark text-decoration-none">
                <div class="card h-100 ">
   
                    @if (Str::startsWith($project->cover_image , 'https://'))
                        <img loading="lazy" class="card-img-top "  src="{{$project->cover_image}}" alt="{{$project->name}}" >
                    @else
                       <img loading="lazy" class="card-img-top"  src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}" >
                            
                    @endif
                    
                    <div class="card-body d-flex flex-column ">
                        <h4>{{$project->name}}</h4> 
                    </div>
                    <div class="card-footer mt-auto">
                       <a href="{{route('guest.projects.show', $project)}}" class="btn btn-secondary " type="button">Read More</a>
                    </div>
                </div></a>
            </div>
            @empty
            <div class="col">
            No Posts Available.
            </div>
             @endforelse
        </div>

    </div>


@endsection