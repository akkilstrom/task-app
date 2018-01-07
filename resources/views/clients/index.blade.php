<?php $nav_clients = 'active'; ?>

@extends( 'layouts.master' )

@section( 'content' )
    <h1>Clients</h1>
	@if( count($clients) >= 1 )
		@foreach ($clients as $client)
			<a href='/clients/{{$client->id}}'> 
				<li>
					{{ $client->name }}  
				</li>
			</a> 
		@endforeach    
	@else 
		<p>No client has been added.</p>
	@endif
	<a href="/clients/create">
		<button class="icon-btn">
			@include( 'icons.plus' )
			<span class="btn-txt">Add new</span>
		</button>
	</a>
@endsection
