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
		<button type="submit" class="icon-btn">
			@include( 'icons.plus' )
			<span class="btn-txt">Add client</span>
		</button>
    </form>
    
@endsection