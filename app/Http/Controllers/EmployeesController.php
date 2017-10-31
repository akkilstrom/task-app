<?php

namespace App\Http\Controllers;

// Import the Employee class
use App\Employee;

class EmployeesController extends Controller
{
    public function index() {
        // $employees = DB::table('employees')->where('visible', '1')->get();
        // Shorter way with Eloquent then the above method
        $employees = Employee::orderBy('firstname', 'asc' )->get();
    
        //return $employees; Returns json data in browser
        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee) {
        return view('employees.show', compact('employee'));
    }

     public function create() {
        return view('employees.create');
    }

    public function store() {
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname'  => 'required',
            'title'     => 'required',
            'email'     => 'required',
        ]);

        //Adds a new employee using the request data & saves it to the database
        Employee::create(request([
            'firstname', 
            'lastname', 
            'title', 
            'email',
            'phone',
            'linkedin'
        ]));
        // $email = '';
        // $linkedin = '';

        // if( $request->input('email') !== null ) {
        //     $email = $request->input('email');
        // }
        // $Employee = new Employee();

        // $Employee->email = $email;

        return redirect( '/employees' );
    }
}
