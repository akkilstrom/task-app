<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {
    
    public function index(Tag $tag) {
        $cards = $tag->cards;
        return view( 'cards.index', compact('cards') );
    }
}
