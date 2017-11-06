@extends( 'layouts.master' )

@section( 'content' )

    <h1>Add an employee</h1>
    <hr>
    <form method="POST" action="/employees">
        {{--  Protects your application from attacks. Generates a CSRF token for 
        each active user session --}}
        {{ csrf_field() }}

        {{--  Firstname  --}}
        <div class="form-group">
            <label for="fname">Firstname</label>
            <input type="text" class="form-control" id="fname" name="firstname" required>
        </div>

        {{--  Lastname  --}}
        <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" class="form-control" id="lname" name="lastname" required>
        </div>

        {{--  Title  --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        {{--  E-mail  --}}
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>

        {{--  Phone  --}}
        <div class="form-group">
            <label for="phone">Telephone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        {{--  linkedin  --}}
        <div class="form-group">
            <label for="linkedin">Linkedin profile</label>
            <input type="text" class="form-control" id="linkedin" name="linkedin">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add employee</button>
        </div>
    </form>
    
@endsection