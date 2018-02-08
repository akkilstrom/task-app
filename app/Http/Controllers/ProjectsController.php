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

        return redirect( '/' );
    }

    // Function to show the chosen project
    public function show(Project $project) {
        $loggedInUserId = Auth::id();
        $tasks = $project->tasks;
        $statuses = ['todo', 'in-progress', 'done'];
        $status = '';

        return view( 'projects.show', [
            'project'           => $project,
            'tasks'             => $tasks,
            'loggedInUserId'    => $loggedInUserId,
            'statuses'          => $statuses
        ]);
    }

    // Function to edit project
    public function edit(Project $project) {
        $selectedClient = Client::find($project->client_id);
        $allClients = Client::All();

        return view( 'projects.edit', [
            'project'           => $project,
            'selectedClient'    => $selectedClient,
            'allClients'        => $allClients
        ]);
    }

    // Function to uptade project when edit has been made
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

    // Function to delete project
    public function destroy($id) {

        Project::findOrFail($id)->delete();

        session()->flash( 'message', 'Your project has been deleted.' );

        return back();
    }
}
