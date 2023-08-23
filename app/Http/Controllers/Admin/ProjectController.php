<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
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
    public function store(ProjectStoreRequest $request)
    {
        $newProject = new Project ();
        $data = $request->validated();
        $newProject->fill($data);
        $newProject->save();


        return redirect()->route('admin.project.index')->with('created', $newProject->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view ('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $projects)
    {
        return view ('admin.projects.edit',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $projects)
    {
        $data = $request->validated();
        $projects->fill($data);
        $projects->update($data);

        return redirect()->route('admin.projects.index', compact('projects'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $projects)
    {

        $projects->delete();
        return redirect()->route('admin.project.index')->with('delete',$projects->name);
    }
}
