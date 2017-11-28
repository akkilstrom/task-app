<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;

class CommentsController extends Controller {

    // public function __construct() {
    //     // you must be signed in to post a comment 
    //     $this->middleware('auth');
    // }
    

    // CHANGE TO TASK
    public function store(Task $task) {

        $this->validate(request(), ['body' => 'required|min:3']);
        
        $user_id = auth()->user()->id;
        $task->addComment(request('body'), $user_id);

        return back();
    }
}
