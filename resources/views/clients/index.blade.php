@extends( 'layouts.master' )

@section( 'content' )
    <h1>Clients</h1>
	@if( count($clients) >= 1 )
		<ul>
			@foreach ($clients as $client)
				<a href='/clients/{{$client->id}}'> 
					<li>
						{{ $client->name }}  
					</li>
				</a> 
			@endforeach    
		</ul>
	@else 
		{{-- NOT WORKING --}}
		<p>No clients has been added.</p>
	@endif
@endsection
