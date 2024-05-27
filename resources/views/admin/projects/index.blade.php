@extends('layouts.admin')

@section('content')

<header class="py-3">
    <div class="container">
        <h1>All Projects</h1>
    </div>
</header>

<div class="container mt-5">
    <div
        class="table-responsive-md"
    >
        <table
            class="table table-striped table-hover table-borderless table-primary align-middle"
        >
            <thead class="table-primary">
               
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Source</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($projects as $project)
                    <tr>
                    <td scope="row">{{$project->id}}</td>
                    <td>
                        @if (Str::startsWith($project->cover_image , 'https://'))
                            <img loading="lazy" width="200" src="{{$project->cover_image}}" alt="{{$project->name}}" >
                        @else
                         <img loading="lazy" width="200" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->name}}" >
                        
                        @endif
                        
                    </td>
                    <td>{{$project->name}}</td>
                    <td> <a href="{{$project->project_url}}" target="_blank" class="text-dark" rel="noopener noreferrer"> Preview</a></td>
                    <td><a href="{{$project->source_code_url}}" target="_blank" rel="noopener noreferrer" class="text-dark">Source Code</a> </td>
                    <td>
                        <a class="btn btn-dark" href="{{route('admin.projects.show', $project)}}"> view</a>
                        <a class="btn btn-secondary" href="{{route('admin.projects.edit', $project)}}"> edit</a>
                        /DELETE</td>
                </tr>
                @empty
                    <tr
                    class="table-dark"
                >
                    <td scope="row" colspan="6">No Projects available</td>
                    
                </tr>
                @endforelse

                
            </tbody>
            <tfoot>
                
            </tfoot>
        </table>
    </div>
    
</div>

@endsection