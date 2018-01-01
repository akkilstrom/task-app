<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Client;
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
        $matchingClient = $project->client;
        $loggedInUserId = Auth::id();

        return view( '/home', [
            'projects'          => $projects,
            'loggedInUserId'    => $loggedInUserId,
            'matchingClient'    => $matchingClient
        ]);
    }
}
