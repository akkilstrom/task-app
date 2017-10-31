<?php

namespace App\Http\Controllers;

use App\Card;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Card $card) {

        $this->validate(request(), ['body' => 'required|min:3']);

        $card->addComment(request('body'));

        // Comment::create([
        //     'body'      => request('body'),
        //     'card_id'   => $card->id
        // ]);

        return back();
    }
}
