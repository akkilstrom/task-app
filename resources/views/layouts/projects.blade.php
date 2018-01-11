<section class="projects-container">
	@if (request()->is('/'))
		<h2>Your projects</h2>
	@endif
	@foreach ($projects as $project)
	<?php $projectLink = '/projects/' . $project->id; ?>
		<div class="project-divider">
			<div class="project-column">
				<a href="{{ url($projectLink) }}"> 
					{{ $project->name }}
				</a>   
			</div>
			<div class="client-column">
				@if($project->client)
				<?php $clientOfProject = '/clients/' . $project->client->id; ?>
					<a href="{{ url($clientOfProject) }}"> 
						{{ $project->client->name }}
					</a> 
				@endif
			</div>
			<div class="edit-column">
			@if( $loggedInUserId == $project->user_id )
				<?php $editProject = '/projects/' . $project->id .'/edit'; ?>
				<a class="edit-btn" href="{{ url($editProject) }}">
					@include( 'icons.edit' )
				</a>
				<form class="delete-form" action="{{ route('projects.destroy', ['id' => $project->id]) }}" 
					method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="trash-btn" aria-label="delete">
						@include( 'icons.trash' )
					</button>
				</form> 
			@endif
			</div>
		</div>
	@endforeach  
	<a href="{{ url('/projects/create') }}">
		<button class="icon-btn">
			@include( 'icons.plus' )
			<span class="btn-txt">Add new</span>
		</button>
	</a>
</section>