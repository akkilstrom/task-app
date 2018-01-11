@extends( 'layouts.master' )

@section( 'content' )
    
    @include( 'tasks.task' )
    <hr>

    <div class="comments">
        <ul class="list-unstyled">
            @foreach( $task->comments as $comment )
                <li class="list-unstyled">
                    <strong>
                        {{ $comment->user->name }}
                        {{ $comment->created_at->diffForHumans() }}: &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>
                <hr>
            @endforeach
        </ul>
    </div>
    
    @guest
        <a href="/login">Sign in to write a comment</a>
    @else
        <h3>Add a comment</h3>
        <?php $commentTasks = '/tasks/' . $task->id . /comments; ?>
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
    @endguest
@endsection