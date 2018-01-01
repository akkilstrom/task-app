@extends( 'layouts.master' )

@section( 'content' )
    <div class="header-box">
        <h1>Tasks of {{ $project->name }}</h1>
        @if( $loggedInUserId == $project->user_id )
            <a class="add-btn" href="/tasks/create">
			@include( 'icons.large_plus' )
		</a>
		@endif
    </div>
    <section class="button-container">
        <button class="filter-btn">
			{{-- @include( 'icons.plus' ) --}}
			<span class="btn-txt">All</span>
		</button>
        <button class="filter-btn">
			<span class="btn-txt">To do</span>
		</button>
        <button class="filter-btn">
			<span class="btn-txt">In progress</span>
		</button>
        <button class="filter-btn">
			<span class="btn-txt">Done</span>
		</button>
    </section>

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