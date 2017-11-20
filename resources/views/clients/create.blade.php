@extends( 'layouts.master' )

@section( 'content' )

    <h1>Add a client</h1>
    <hr>
    <form method="POST" action="/clients">
        {{ csrf_field() }}

        {{--  Name  --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add client</button>
        </div>
    </form>
    
@endsection