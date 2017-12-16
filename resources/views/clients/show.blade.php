@extends( 'layouts.master' )

@section( 'content' )

    <h1>Projects of {{ $client->name }}</h1>
	@foreach( $projectsOfClient as $project )
		<a href='#'> 
			<li>{{ $project->name }} </li>
		</a> 
	@endforeach
    
@endsection