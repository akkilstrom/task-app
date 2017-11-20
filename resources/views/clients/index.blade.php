@extends( 'layouts.master' )

@section( 'content' )
    <h1>Clients</h1>
	<ul>
		@foreach ($clients as $client)

			<li>{{ $client->name }}</li>
			
		@endforeach    
	</ul>
@endsection