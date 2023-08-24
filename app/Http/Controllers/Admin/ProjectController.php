<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('image')){
            $img_path = Storage::disk('public')->put('uploads/projects', $data['image']);
            $newProject->image = $img_path;
        }

        $newProject->save();


        return redirect()->route('admin.projects.index')->with('created', $newProject->title);
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
    public function edit(Project $project)
    {
        // @dd($project);
        return view ('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->update($data);

        if ($request->hasFile('image')){
            Storage::delete($project->image);
            $img_path = Storage::disk('public')->put('uploads/projects', $data['image']);
            $data['image'] = $img_path;
        }

        return redirect()->route('admin.projects.index', compact('project'))->with('update',$project->title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index')->with('delete',$project->title);
    }

    public function softDelete (){

        $projects = Project::onlyTrashed()->paginate(10);
        // @dd($projects);
        return view('admin.projects.trashed', compact('projects'));

    }
    public function restore ($id){

        $project = Project::withTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('admin.projects.index')->with('restored',$project->title);
    }

    public function hardDelete ($id){
        
        $project = Project::onlyTrashed()->findOrFail($id);
        Storage::delete($project->image);
        $project->forceDelete();

        return redirect()->route('admin.projects.index')->with('removed',$project->title);

    }
}