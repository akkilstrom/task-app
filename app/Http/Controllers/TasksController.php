<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

use Log;

class TasksController extends Controller {
    public function __construct() {
        // you must be signed in to create & store a task. 
        $this->middleware('auth')->except(['update']);
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
        $statuses = ['todo', 'in-progress', 'done'];
        
        return view( 'tasks.index', compact('tasks') );
        //  return view( 'projects.index', [
        //     'tasks'             => $tasks,
        //     'statuses'          => $statuses
        // ]);
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
            // 'level_of_effort'   => 'required',
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
                'status'
                // 'level_of_effort'
            ]))
        );
        
        session()->flash( 'message', 'Your task has been added.' );
        
        return redirect( '/tasks' );
    }

    public function edit(Task $task) {
        $selectedProject = Project::find($task->project_id);
        $allProjects = Project::All();

        return view( 'tasks.edit', [
            'task'              => $task,
            'selectedProject'   => $selectedProject,
            'allProjects'       => $allProjects
        ]);
    }
    
    public function update(Request $request, $id) {
        $this->validate($request, [
        //     'task'              => 'required',
        //     'description'       => 'required',
        //     'importance'        => 'required',
        //     'deadline'          => 'required',
        //     'project_id'        => 'required',
                'status'            => 'required',
        //     'level_of_effort'   => 'required'
        ]);

        Log::info(print_r($id, true));
        Log::info(print_r($request->input('status'), true));

        $task = Task::find($id);

        $task->update([
            // 'task'              => $request->input('task'),
            // 'description'       => $request->input('description'),
            // 'importance'        => $request->input('importance'),
            // 'deadline'          => $request->input('deadline'),
            // 'project_id'        => $request->input('project_id'),
            'status'                => $request->input('status')
        ]);

        // return redirect( '/tasks' );
        return 'uppdaterad';
    }

    // Function to delete task
    public function destroy($id) {

        Task::findOrFail($id)->delete();

        session()->flash( 'message', 'The task has been deleted.' );

        return back();
    }
}
