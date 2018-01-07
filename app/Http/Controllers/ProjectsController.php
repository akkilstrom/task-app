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

        return redirect( '/' );
    }

    // Function to show the chosen project
    public function show(Project $project) {
        $loggedInUserId = Auth::id();
        $tasks = $project->tasks;
        $status = '';
        // $filtered = '';
        $filtered = $tasks->where('status', 'todo' )->get();
        // $sortBy = isset( $request->sort ) ? $request->sort : 'created_at';

        // $sort = isset( $request->direction ) ? $request->direction : 'desc';

        // $tasks = Project::orderBy($sortBy, $sort)->paginate(20);

        // return view('projects.show', ['products' => $products]);

        // switch($status) {
        //     // TO DO 0
        //     case 'todo' :
        //         $filtered = $tasks->where('status', 0 )->get();
        //         break;
        //     // IN PROGRESS 1
        //     case 'progress' :
        //         $filtered = $tasks->where('status', 1 )->get();
        //         break;
        //     // DONE 2
        //     case 'done' :
        //         $filtered = $tasks->where('status', 2 )->get();
        //         break;
        //     // ALL TASKS
        //     default :
        //         $tasks = $project->tasks;
        //         // $tasks = Task::latest()->get();
        // }

        // if (request('todo') {
        //     $tasks = Task::where('status', 0)->get();
        // } elseif(request('progress') {
        //     $tasks = Task::where('status', 1)->get();
        // } elseif(request('done') {
        //     $tasks = Task::where('status', 2)->get();
        // }

        return view( 'projects.show', [
            'project'           => $project,
            'tasks'             => $tasks,
            'loggedInUserId'    => $loggedInUserId,
            'filtered'          => $filtered,
            'status'            => $status
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
