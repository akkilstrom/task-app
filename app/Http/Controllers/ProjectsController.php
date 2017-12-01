<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;

class ProjectsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index() {
        $projects = Project::orderBy('name', 'asc')->get();
        return view( 'projects.index', compact('projects') );
    }

    
    public function create() {
        $clients = Client::All();
        return view( 'projects.create', compact('clients') );
    }

    
    public function store() {
        $this->validate(request(), [
            'name'          => 'required',
            'client_id'     => 'required'
        ]);

        auth()->user()->addProject(
            new Project(request(['name', 'client_id']))
        );

        session()->flash( 'message', 'Your project has been added.' );

        return redirect( '/projects' );
    }

    
    public function show(Project $project) {
        return view( 'projects.show', compact('project') );
    }

    
    public function edit(Project $project) {
        $client = Client::find($project->client_id);
        $selected_client_name = $client->name;

        return view( 'projects.edit', [
            'project'               => $project,
            'selected_client_name'  => $selected_client_name  
        ]);
    }

    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'          => 'required',
            'client_id'     => 'required'
        ]);

        $project = Project::find($id);
        $project->save();
        
        return redirect()->route('projects.index');
    }

    
    public function destroy($id) {
        
        Project::find($id)->delete();
        // $project = Project::find($id);
		// $project->delete();
        
        session()->flash( 'message', 'Your project has been deleted.' );

        return back();
    }
}
