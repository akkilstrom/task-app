<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function create() {
        return view( 'clients.create' );
    }

    public function store() {
        $this->validate(request(), [
            'name'          => 'required',
            'department'    => 'required',
            'client'        => 'required'
        ]);

        auth()->user()->addProject(
            //lägg till client
            new Project(request(['name', 'department', 'client']))
        );

        session()->flash( 'message', 'Your project has been added.' );

        // Redirects back to all projects
        return redirect( '/projects' );
    }
}
