<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;

class HomeController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    **/
    public function __construct() {
        $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    **/
    public function index(Project $project) {   

        $projects = Project::whereUserId(Auth::id())->get();
    
        return view( '/home', compact('projects') );
    }
}
