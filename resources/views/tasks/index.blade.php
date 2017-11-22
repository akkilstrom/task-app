@extends( 'layouts.master' )

@section( 'content' )
    <h1>Tasks</h1>
    @foreach( $tasks as $task )
        @include( 'tasks.task' )
    @endforeach
    
    <nav class="pagination">
        <a class="btn-back" href="#">Older</a>
        <a class="btn-forward" href="#">Newer</a>
    </nav>

@endsection