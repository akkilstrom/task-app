<section class="projects-container">
	@if (request()->is('/'))
		<h2>Your projects</h2>
	@endif
	@foreach ($projects as $project)
		<div class="project-divider">
			<a href='/projects/{{$project->id}}'> 
				{{ $project->name }}
			</a>   
			{{-- <a href='/clients/{{$matchingClient->id}}'> 
				{{ $matchingClient->name }}
			</a>  --}}
			<div class="edit-container">
				<a class="edit-btn" href="/projects/{{$project->id}}/edit">
					@include( 'icons.edit' )
				</a>
				<form class="delete-form" action="{{ route('projects.destroy', ['id' => $project->id]) }}" 
					method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="trash-btn">
						@include( 'icons.trash' )
					</button>
				</form> 
			</div>
		</div>
	@endforeach  
	<a href="/projects/create">
		<button class="icon-btn">
			@include( 'icons.plus' )
			<span class="btn-txt">Add new</span>
		</button>
	</a>
</section>