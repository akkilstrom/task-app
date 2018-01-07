@extends( 'layouts.master' )

@section( 'content' )

    <h1>Projects of {{ $client->name }}</h1>
	@if( count($projectsOfClient) >= 1 )
		@foreach( $projectsOfClient as $project )
			<a href="/projects/{{$project->id}}"> 
				<li>{{ $project->name }} </li>
			</a> 
		@endforeach
	@else 
		<p>No project has been added to this client.</p>
	@endif

@endsection