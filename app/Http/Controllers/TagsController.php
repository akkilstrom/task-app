<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Task;

use Illuminate\Http\Request;

class TagsController extends Controller {
    
    public function index(Tag $tag) {

        $tasks = $tag->tasks;
        return view( 'tasks.index', compact('tasks') );
    }
}
