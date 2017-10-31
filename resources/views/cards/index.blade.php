@extends( 'layouts.master' )

@section( 'content' )
    @foreach( $cards as $card )
        @include( 'cards.card' )
    @endforeach
    
    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

@endsection