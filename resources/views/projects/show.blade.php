@extends( 'layouts.master' )

@section( 'content' )

    <h1>Taskboard {{ $project->name }}</h1>
	<section class="tasks-container">
    @if($tasks)
        @foreach( $tasks as $task )
            @include( 'tasks.task' )
        @endforeach
    @endif
    </section>
    
@endsection