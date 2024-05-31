<?php

namespace App\Http\Controllers\Admin; //edit namespace

use App\Models\Project; //import
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller; //import
use Illuminate\Support\Facades\Storage; //import facade
use Illuminate\Support\Str; // Correct import
use App\Models\Type;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Project::all());
        return view('admin.projects.index',['projects'=>Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types= Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //error 403
        //dd($request->all());
        $validated = $request->validated();
        if($request->has('cover_image')){
            $validated['cover_image'] = Storage::put('uploads', $request->cover_image); //a dove, da dove   in your codebase STORAGE you'll have the images uploaded
        }
   
        Project::create($validated);
        //dd();

        return to_route('admin.projects.index')->with('message','Congratulation! Project added correctly to your portfolio');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //dd($request->all());
        //validate inputs 
        $validated = $request->validated();
        
        //update  cover image
        if($request->has('cover_image')){
            if($project->cover_image){
                Storage::delete($project->cover_image);
            }
            $image_path = Storage::put('uploads', $request->cover_image);
            $validated['cover_image'] = $image_path;
        };
        
        //update model
        $project->update($validated);

        //redirect
        return to_route('admin.projects.index')->with('message','Congratulation! Project updated correctly.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
       if($project->cover_image && !Str::startsWith($project->cover_image,'https://')){
        Storage::delete($project->cover_image);
       };
       $project->delete();
       return to_route('admin.projects.index')->with('message','Congratulation! Project deleted correctly.');
    }
}
