@extends( 'layouts.master' )

@section( 'content' )
    <h1>Employees</h1>
    <ul>
        @foreach ($employees as $employee)

            <li>
                <a href='/employees/{{$employee->id}}'>
                    {{ $employee->firstname }} {{ $employee->lastname }} 
                </a>
            </li>
            
        @endforeach    
    </ul>
@endsection
