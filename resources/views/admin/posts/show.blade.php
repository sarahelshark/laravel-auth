@extends('layouts.admin')

@section('content')

<div class="container">
   <img src="{{$post->cover_image}}" alt="">
   <div>{{$post->title}}</div>
   <div>{{$post->slug}}</div>
   <a class="btn btn-primary" href="{{route('admin.posts.index')}}" > Go Back</a>
</div>

@endsection