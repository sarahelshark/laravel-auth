@extends('layouts.guest')
@section('content')

<div class="jumbotron p-5  bg-light rounded-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-auto">
                <div class="profile_image">
                    <img width="200px" class="img-fluid rounded-circle" src="/img/gatto_saggio.jpg" alt="my profile pic" srcset="">
                </div>
            </div>
            <div class="col">
                <h1 class="display-5 fw-bold">
                    Welcome to my potfolio
                </h1>
        
                <p class="col-md-8 fs-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolorem commodi veritatis adipisci temporibusoris repellendus facilis animi magnam? Commodi totam doloribus voluptatem magni tempora reiciendis perspiciatis.
                </p>
                <a href="{{route('guest.projects.index')}}" class="btn btn-secondary btn-lg" type="button">Check out my projects</a>
            </div>
        </div>
        
      
    </div>
</div>


<div class="content">
    <div class="container mt-4">
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!
        </p>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3  mt-4">
         @forelse ($posts as $post)
         <div class="col">
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
                   <a href="{{route('guest.posts.show', $post)}}" class="btn btn-secondary " type="button">Read More</a>
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

    

    
        
    
        
    
</div>

@endsection

