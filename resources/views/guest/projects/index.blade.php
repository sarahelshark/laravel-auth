@extends('layouts.guest')

@section('content')
<header class="py-3">
    <div class="container">
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
</header>

@endsection