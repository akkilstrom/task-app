<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/cards/{{ $card->id }}">{{ $card->task }}</a>
    </h2>
    <p class="blog-post-meta">{{ $card->created_at->toFormattedDateString() }} 
    <a href="#">{{ $card->user->name }}</a></p>
    <p class="blog-post-meta">Priority: {{ $card->importance }}
        Deadline: {{ $card->deadline }}</p>
    <p> {{ $card->description }}</p>
</div><!-- /.blog-post -->

    