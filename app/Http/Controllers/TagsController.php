<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Task;

use Illuminate\Http\Request;

class TagsController extends Controller {
    
    public function index(Tag $tag) {
        // $cards = $tag->cards;
        // return view( 'cards.index', compact('cards') );

        $tasks = $tag->tasks;
        return view( 'tasks.index', compact('tasks') );
    }
}
