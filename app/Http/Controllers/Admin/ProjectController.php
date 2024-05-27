<?php

namespace App\Http\Controllers\Admin; //edit namespace

use App\Models\Project; //import
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller; //import
use Illuminate\Support\Facades\Storage; //import facade

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
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //error 403
        //dd($request->all());
        $validated = $request->validated();
        $validated['cover_image'] = Storage::put('uploads', $request->cover_image); //a dove, da dove   in your codebase STORAGE you'll have the images uploaded
   
        Project::create($validated);

        return to_route('admin.projects.index')->with('message','Congratulation! Project added correctly to your portfolio');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
