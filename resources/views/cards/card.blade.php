<article class="task-card">
    <h2>
        <a href="/cards/{{ $card->id }}">{{ $card->task }}</a>
    </h2>
    <p class="task-meta">
        {{-- Client: {{ $client->name }} <br> --}}
        <a href="#">{{ $card->user->name }}</a> on
        {{ $card->created_at->toFormattedDateString() }} 
    </p>
    <p class="task-meta">
        Priority: {{ $card->importance }} <br>
        Deadline: {{ $card->deadline }} <br>

        @if(count($card->tags))
            Tags:
            @foreach($card->tags as $tag)
                <a href="/cards/tags/{{ $tag->name }}">#{{ $tag->name }}</a>
            @endforeach
        @endif
    </p>
    <p> {{ $card->description }}</p>
</article><!-- /.task-card -->

    