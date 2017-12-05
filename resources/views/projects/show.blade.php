@extends( 'layouts.master' )

@section( 'content' )

    <h1>Taskboard {{ $project->name }}</h1>
	{{-- <section class="tasks-container">
        @foreach( $tasksOfProject as $task )
            @include( 'tasks.task' )
        @endforeach
    </section> --}}
    
@endsection