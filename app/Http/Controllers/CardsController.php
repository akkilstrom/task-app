<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function __construct() {
        // you must be signed in to create & store a post. Guests can see the posts
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {

        if (request(['month', 'year'])) {
            $cards = Card::latest()
                ->filter(request(['month', 'year']))
                ->get();

        } else {
            $cards = Card::latest()->get();
        }

        $archives = Card::archives();

        return view( 'cards.index', compact('cards') );
    }

    public function show(Card $card) {
        return view( 'cards.show', compact('card') );
    }

    public function create() {
        return view( 'cards.create' );
    }

    public function store() {
        // Server side validation of the request data
        // If anything fails it redirects to the previous page and..
        // includes a populated errors variable
        $this->validate(request(), [
            'task'          => 'required',
            'description'   => 'required',
            'importance'    => 'required',
            'deadline'      => 'required'//DOES NOT HAVE TO BE REQUIRED
        ]);

        // Calls a method on your authenticated user object & publish a new... 
        // ...card which will be linked to the authenticated user
        auth()->user()->publish(
            new Card(request(['task', 'description', 'importance', 'deadline']))
        );

        session()->flash( 'message', 'Your card has been added.' );
        
        //Creates a new card using the request data & saves it to the database
        // Card::create([
        //     'task'          => request('task'), 
        //     'description'   => request('description'), 
        //     'importance'    => request('importance'),
        //     'deadline'      => request('deadline'),
        //     'user_id'       => auth()->id()
        // ]);

        // Redirects back to the card board
        return redirect( '/cards' );
    }
}
