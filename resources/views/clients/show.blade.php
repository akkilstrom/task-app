@extends( 'layouts.master' )

@section( 'content' )

    <h1>Projects of {{ $client->name }}</h1>
	{{-- @foreach( $projects as $project )
		@include( 'tasks.task' )
	@endforeach --}}
    
@endsection