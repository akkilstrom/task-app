<article class="task-card">
    <div class="task-header">
        <h2>
            <a href="/tasks/{{ $task->id }}">{{ $task->task }}</a>
        </h2>
        <div class="status-container">
            @switch($task->status)
                @case(0)
                    @include( 'icons.todo' )
                    @break

                @case(1)
                    @include( 'icons.progress' )
                    @break
                
                {{-- ändra till 2 och ta bort in review --}}
                @case(2) 
                    @include( 'icons.done' )
                    @break
            @endswitch
        </div>
    </div>
    
    <p class="task-meta">
        {{-- Client: {{ $client->name }} <br> --}}
        <a href="#">{{ $task->user->name }}</a> on
        {{ $task->created_at->toFormattedDateString() }} 
    </p>
    <p class="task-meta">
        Priority: {{ $task->importance }} <br>
        Deadline: {{ $task->deadline }} <br>

        @if(count($task->tags))
            Tags:
            @foreach($task->tags as $tag)
                <a href="/tasks/tags/{{ $tag->name }}">#{{ $tag->name }}</a>
            @endforeach
        @endif
    </p>
    <p> {{ $task->description }}</p>
</article><!-- /.task-card -->

    