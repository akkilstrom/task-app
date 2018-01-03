@extends( 'layouts.master' )

@section( 'content' )
    <h1>Tasks of {{ $project->name }}</h1>
        
    <div class="header-box">
        <a href="/projects/{project}?{{$status='all'}}">
            <b class="btn-txt">All</b>
        </a> |
        <a href="#">
            <b class="btn-txt">To do</b>
        </a> |
        <a href="#">
            <b class="btn-txt">In progress</b>
        </a> |
        <a href="#">
            <b class="btn-txt">Done</b>
        </a>
        @if( $loggedInUserId == $project->user_id )
            <a href="/tasks/create">
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

{{-- @if( isset($archives) )
        <div class="aside-item">
            <h4>Tasks archives</h4>
            <ol class="list-unstyled">
                @foreach($archives as $stats)
                    <li>
                        <a href="/tasks?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                            {{ $stats['month'] . ' ' . $stats['year'] }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif --}}