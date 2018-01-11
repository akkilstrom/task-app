<?php $nav_projects = 'active'; ?>

@extends( 'layouts.master' )

@section( 'content' )

    <h1>Add a project</h1>
    <form method="POST" action="{{ url('/projects') }}">
        {{--  Protects your application from attacks. Generates a CSRF token for 
        each active user session --}}
        {{ csrf_field() }}

        {{--  Name  --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>

         {{--  Client --}} 
        <div class="form-group">
            <label for="client_id">Client</label>
            <select id="client_id" name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option> 
                @endforeach
            </select>
        </div>
        <button type="submit" class="icon-btn">
			@include( 'icons.plus' )
			<span class="btn-txt">Add project</span>
		</button>
    </form>
    
@endsection