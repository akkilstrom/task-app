<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/cards/{{ $card->id }}">{{ $card->task }}</a>
    </h2>
    <p class="blog-post-meta">
        <a href="#">{{ $card->user->name }}</a> on
        {{ $card->created_at->toFormattedDateString() }} 
    </p>
    <p class="blog-post-meta">
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
</div><!-- /.blog-post -->

    