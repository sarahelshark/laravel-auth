@extends('layouts.guest')

@section('content')

<div class="container">
   <img src="{{$post->cover_image}}" alt="">
   <div>{{$post->title}}</div>
   <div>{{$post->content}}</div>
   <div>{{$post->slug}}</div>
   <a class="btn btn-primary" href="{{ url('/') }}" > Go Back</a>
   <a class="btn btn-primary" href="{{route('guest.posts.index')}}" > see more posts</a>
   
</div>

@endsection