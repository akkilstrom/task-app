@extends( 'layouts.master' )

@section( 'content' )
    <h1>Tasks of {{ $project->name }}</h1>
        
    <div class='header-box'>
        <a class='filter-btn active' id='all' href="#">
            <b class="btn-txt">All</b>
        </a> 
        <a class='filter-btn' id='todo' href="#">
            <b class="btn-txt">To do</b>
        </a> 
        <a class='filter-btn' id='progress' href="#">
            <b class="btn-txt">In progress</b>
        </a> 
        <a class='filter-btn' id='done' href="#">
            <b class="btn-txt">Done</b>
        </a>
        @if( $loggedInUserId == $project->user_id )
            <a href="{{ url('/tasks/create') }}">
                <button class="icon-btn-small">
                    @include( 'icons.plus' )
                </button>
            </a>
        @endif
    </div>
	<section class="tasks-container">
    @if($tasks)
        @foreach( $tasks as $task )
            @include( 'tasks.task' )
        @endforeach
    @endif
    </section>
    
@endsection
