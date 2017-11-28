<article class="task-card">
    <h2>
        <a href="/tasks/{{ $task->id }}">{{ $task->task }}</a>
    </h2>
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

    