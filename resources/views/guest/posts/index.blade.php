@extends('layouts.guest')

@section('content')
<header class="py-3">
    <div class="container">
        <h1>All Posts for Guests</h1>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3  mt-4 g-4">
            @forelse ($posts as $post)
            <div class="col">
               <div class="card h-100">
   
                   @if (Str::startsWith($post->cover_image , 'https://'))
                       <img loading="lazy" class="card-img-top "  src="{{$post->cover_image}}" alt="{{$post->name}}" >
                   @else
                      <img loading="lazy" class="card-img-top"  src="{{asset('storage/' . $post->cover_image)}}" alt="{{$post->name}}" >
                           
                   @endif
                   
                   <div class="card-body d-flex flex-column ">
                       <h4>{{$post->name}}</h4> 
                   </div>
                   <div class="card-footer mt-auto">
                      <a href="{{route('guest.posts.index')}}" class="btn btn-secondary " type="button">Read More</a>
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
    
</header>

@endsection