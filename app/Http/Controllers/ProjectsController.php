<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller {

    //public function __construct() {
        // you must be signed in to create a project
    //    $this->middleware('auth');
    //}

    public function index() {
        $projects = Project::orderBy('name', 'desc')->get();
        return view( 'projects.index', compact('projects') );
    }

    public function create() {
        return view( 'projects.create' );
    }

    public function store() {
        $this->validate(request(), [
            'name'          => 'required',
            'department'    => 'required',
            'client'        => 'required'
        ]);

        auth()->user()->addProject(
            //lägg till client
            new Project(request(['name', 'department', 'client']))
        );

        session()->flash( 'message', 'Your project has been added.' );

        // Redirects back to all projects
        return redirect( '/projects' );
    }
}
