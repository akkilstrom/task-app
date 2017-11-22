<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class TasksController extends Controller {
    public function __construct() {
        // you must be signed in to create & store a post. 
        $this->middleware('auth');
        // ->except(['index', 'show']);Guests can see the posts
    }

    public function index() {
        if (request(['month', 'year'])) {
            $tasks = Task::latest()
                ->filter(request(['month', 'year']))
                ->get();

        } else {
            $tasks = Task::latest()->get();
        }

        $archives = Task::archives();
        return view( 'tasks.index', compact('tasks') );
    }

    public function show(Task $task) {
        return view( 'tasks.show', compact('task') );
    }

    public function create() {
        $projects = Project::All();
        return view( 'tasks.create', compact('projects') );
    }

    public function store() {
        // Server side validation of the request data
        // If anything fails it redirects to the previous page and..
        // includes a populated errors variable
        $this->validate(request(), [
            'task'              => 'required',
            'description'       => 'required',
            'importance'        => 'required',
            'deadline'          => 'required',
            'project_id'        => 'required',
            'status'            => 'required',
            'level_of_effort'   => 'required',
            //ADD ALL THE INPUTS THAT SHALL BE REQUIRED
        ]);

        // Calls a method on your authenticated user object & publish a new... 
        // ...card which will be linked to the authenticated user
        auth()->user()->publish(
            new Task(request([
                'task', 
                'description', 
                'importance', 
                'deadline', 
                'project_id',
                'status',
                'level_of_effort'
            ]))
        );

        session()->flash( 'message', 'Your task has been added.' );
        
        //Creates a new card using the request data & saves it to the database
        // Card::create([
        //     'task'          => request('task'), 
        //     'description'   => request('description'), 
        //     'importance'    => request('importance'),
        //     'deadline'      => request('deadline'),
        //     'user_id'       => auth()->id()
        // ]);

        // Redirects back to the card board
        return redirect( '/tasks' );
    }
}
