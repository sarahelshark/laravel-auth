@extends('layouts.admin')

@section('content')
<header class="py-3">
    <div class="container">
        <h1>All Posts</h1>
    </div>
</header>
<div class="container">
    <div
        class="table-responsive"
    >
        <table
            class="table table-light"
        >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Coverimage</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr class="">
                    <td scope="row">{{
                        $post->id}}</td>
                        <td scope="row">{{
                            $post->title}}</td>
                    <td>
                        <img src="{{$post->cover_image}}" alt=""></td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="{{route('admin.posts.show',$post)}}" > view details</a>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td scope="row" colspan="5">No records to show</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>

@endsection