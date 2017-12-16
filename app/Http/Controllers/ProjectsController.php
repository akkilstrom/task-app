<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
use App\Task;
use App\User;
use Auth;

class ProjectsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index(Project $project) {
        $projects = Project::orderBy('name', 'asc')->with('client')->get();
        $loggedInUserId = Auth::id();
        // dd($projects);
        // $matchingClient = $project->client;

        return view( 'projects.index', [
            'projects'          => $projects,
            'loggedInUserId'    => $loggedInUserId
        ]);
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
        // $tasks = Task::find($project->id);
        $tasks = $project->tasks;
        // echo '<pre>',print_r($tasks),'</pre>';
        // return view( 'projects.show', compact('project') );
        return view( 'projects.show', [
            'project'   => $project,
            'tasks'     => $tasks
        ]);
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
