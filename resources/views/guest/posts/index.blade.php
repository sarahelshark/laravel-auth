@extends('layouts.guest')

@section('content') 
   <div class="p-5 mb-4 bg-light rounded-3" >
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Custom jumbotron</h1>
        <p class="col-md-8 fs-4">
            Using a series of utilities, you can create this jumbotron, just
            like the one in previous versions of Bootstrap. Check out the
            examples below for how you can remix and restyle it to your liking.
        </p>
       <a href="#posts">
        <button class="btn btn-dar btn-lg" type="button">go to posts</button>
       </a>
       
            
    </div>
   </div>
   
<div id="posts" class="container py-3">
        <h1>All Posts for Guests</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3  mt-4 g-4">
            @forelse ($posts as $post)
            <div class="col" >
               <div class="card h-100">
   
                   @if (Str::startsWith($post->cover_image , 'https://'))
                       <img loading="lazy" class="card-img-top "  src="{{$post->cover_image}}" alt="{{$post->title}}" >
                   @else
                      <img loading="lazy" class="card-img-top"  src="{{asset('storage/' . $post->cover_image)}}" alt="{{$post->title}}" >
                           
                   @endif
                   
                   <div class="card-body d-flex flex-column ">
                       <h4>{{$post->title}}</h4> 
                   </div>
                   <div class="card-footer mt-auto">
                      <a href="{{route('guest.posts.show',$post )}}" class="btn btn-secondary " type="button">Read More</a>
                   </div>
               </div>
            </div>
            @empty
            <div class="col">
            No Posts Available.
            </div>
             @endforelse
           </div>
    </div>
    


@endsection