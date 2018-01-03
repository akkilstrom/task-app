<article class="task-card">
    <div class="task-header">
        <h2> {{ $task->task }}</h2>
        <div class="status-container">
            @switch($task->status)
                @case(0)
                    @include( 'icons.todo' )
                    @break

                @case(1)
                    @include( 'icons.progress' )
                    @break
                
                @case(2) 
                    @include( 'icons.done' )
                    @break
            @endswitch
        </div>
    </div>
    
    <p class="task-meta">
        <b>Client:</b> client name here <br>
        <b>Created by:</b> {{ $task->user->name }} on
        {{ $task->created_at->toFormattedDateString() }} 
    </p>
    <p class="task-meta">
        <b>Priority: </b>{{ $task->importance }} <br>
        <b>Deadline: </b>{{ $task->deadline }} <br>

        @if(count($task->tags))
            Tags:
            @foreach($task->tags as $tag)
                <a href="/tasks/tags/{{ $tag->name }}">#{{ $tag->name }}</a>
            @endforeach
        @endif
    </p>
    @if('projects.show')
        <a class="task-meta" href="/tasks/{{ $task->id }}">Read more</a>    
    @elseif('tasks.show')
        <p> {{ $task->description }}</p>
    @endif
</article><!-- /.task-card -->

    