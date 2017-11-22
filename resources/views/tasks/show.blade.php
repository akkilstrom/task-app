@extends( 'layouts.master' )

@section( 'content' )
    
    @include( 'tasks.task' )
    <hr>

    <div class="comments">
        <ul class="list-group">
            @foreach( $task->comments as $comment )
                <li class="list-group-item">
                    <strong>
                        {{ $comment->user->name }}
                        {{ $comment->created_at->diffForHumans() }}: &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>

            @endforeach
        </ul>
    </div>
    <hr>
    @guest
        <a href="/login">Sign in to write a comment</a>
    @else
        <div class="card">
            <div class="card-block">

                <form action="/tasks/{{$task->id}}/comments" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="comment" class="form-control" 
                            placeholder="Your comment here" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add comment</button>
                    </div>
                </form>

            </div>{{-- /.card-block  --}}
        </div>{{-- /.card  --}}
    @endguest
@endsection