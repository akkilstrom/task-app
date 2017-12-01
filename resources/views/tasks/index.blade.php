@extends( 'layouts.master' )

@section( 'content' )
    <h1>Tasks</h1>
    <section class="tasks-container">
        @foreach( $tasks as $task )
            @include( 'tasks.task' )
        @endforeach
    </section>
    <nav class="pagination">
        <a class="btn-back" href="#">Older</a>
        <a class="btn-forward" href="#">Newer</a>
    </nav>

@endsection