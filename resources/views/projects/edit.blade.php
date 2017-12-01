@extends( 'layouts.master' )

@section( 'content' )

    <h1>Edit project</h1>
	<form action="{{ route('projects.update', ['id' => $project->id]) }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
        
        {{--  Name  --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" 
				value="{{ $project->name }}" required>
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
			<span class="btn-txt">Update project</span>
		</button>
    </form>
    
@endsection

