<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $projects = Project::where('user_id', Auth::user()->id)->get();

            return view('projects.index', ['projects' => $projects]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', compact('company_id','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $project = Project::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'company_id' => $request->input('company_id'),
                'user_id'  => Auth::user()->id
            ]);

            if($project){
                return redirect()->route('projects.show', ['Project' =>$project->id])
                    ->with('success', 'Project created successfully');
            }
        }
        //return back()->withInput()->with('error','Error creating a new Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', compact('project','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        //find instance of Project model where id
        $projectUpdate = Project::find($project->id);

        //update data
        $projectUpdate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        if($projectUpdate){
            return redirect()->route('projects.show', ['Project' =>$project->id])
                ->with('success', 'Project updated successfully');
        }

        //redirect to page that we just edited
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $findProject = Project::find($project->id);
        if($findProject->delete()){
            return redirect()->route('projects.index')
                ->with('success', 'Project deleted successfully');
        }

        return back()->withInput()->with('error', 'Project could not be deleted');
    }

}
