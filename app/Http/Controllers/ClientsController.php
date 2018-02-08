<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $clients = Client::orderBy('name', 'asc')->get();
        return view( 'clients.index', compact('clients') );
    }

    public function create() {
        return view( 'clients.create' );
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        Client::create(request([ 'name' ]));

        session()->flash( 'message', 'The client has been added.' );
        return redirect( '/clients' );
    }

     public function show(Client $client) {
        $projectsOfClient = $client->projects;

        return view( 'clients.show', [
            'client'            => $client,
            'projectsOfClient'  => $projectsOfClient
        ]);
    }
}
