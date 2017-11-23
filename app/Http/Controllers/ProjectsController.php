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
            'department'    => 'required',
            'client_id'     => 'required'
        ]);

        auth()->user()->addProject(
            new Project(request(['name', 'department', 'client_id']))
        );

        session()->flash( 'message', 'Your project has been added.' );

        return redirect( '/projects' );
    }

    public function show(Project $project) {
        return view( 'projects.show', compact('project') );
    }
}
