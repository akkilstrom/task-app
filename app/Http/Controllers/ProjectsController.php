<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\Task;

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
        
        // $tasksOfProject = Task::find($project->id);
        return view( 'projects.show', compact('project') );

        // return view( 'projects.show', [
        //     'project'           => $project,
        //     'tasksOfProject'    => $tasksOfProject
        // ]);
    }


    public function edit(Project $project) {
        $selectedClient = Client::find($project->client_id);
        $allClients = Client::All();

        return view( 'projects.edit', [
            'project'           => $project,
            'selectedClient'    => $selectedClient,
            'allClients'        => $allClients
        ]);
    }

    
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name'          => 'required',
            'client_id'     => 'required'
        ]);

        $project = Project::find($id);

        $project->update([
            "name"      => $request->input('name'),
            "client_id" => $request->input('client_id')
        ]);

        return redirect( '/projects' );
    }

    
    public function destroy($id) {

        Project::findOrFail($id)->delete();

        session()->flash( 'message', 'Your project has been deleted.' );

        return back();
    }
}
