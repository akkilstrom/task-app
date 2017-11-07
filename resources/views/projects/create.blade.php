@extends( 'layouts.master' )

@section( 'content' )

    <h1>Add a project</h1>
    <hr>
    <form method="POST" action="/projects">
        {{--  Protects your application from attacks. Generates a CSRF token for 
        each active user session --}}
        {{ csrf_field() }}

        {{--  Name  --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>

        {{--  Department  CHANGE TO DROP DOWN--}}
        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" >
        </div>

        {{--  Client CHANGE TO DROP DOWN --}}
        {{--  <div class="form-group">
            <label for="client">Client</label>
            <input type="text" class="form-control" id="client" name="client" required>
        </div>  --}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add project</button>
        </div>
    </form>
    
@endsection