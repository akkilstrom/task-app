@extends( 'layouts.master' )

@section( 'content' )
    <h1>Tasks</h1>
    @foreach( $cards as $card )
        @include( 'cards.card' )
    @endforeach
    
    <nav class="pagination">
        <a class="btn-back" href="#">Older</a>
        <a class="btn-forward" href="#">Newer</a>
    </nav>

@endsection