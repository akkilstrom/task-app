<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Comment;

class CommentsController extends Controller {

    // public function __construct() {
    //     // you must be signed in to post a comment 
    //     $this->middleware('auth');
    // }
    
    public function store(Card $card) {

        $this->validate(request(), ['body' => 'required|min:3']);
        
        $user_id = auth()->user()->id;
        $card->addComment(request('body'), $user_id);

        return back();
    }
}
