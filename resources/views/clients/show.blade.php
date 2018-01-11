@extends( 'layouts.master' )

@section( 'content' )

    <h1>Projects of {{ $client->name }}</h1>
	@if( count($projectsOfClient) >= 1 )
		@foreach( $projectsOfClient as $project )
			<?php $projectLink = '/projects/' . $project->id; ?>
			<a href="{{ url($projectLink) }}"> 
				<li>{{ $project->name }} </li>
			</a> 
		@endforeach
	@else 
		<p>No project has been added to this client.</p>
	@endif

@endsection