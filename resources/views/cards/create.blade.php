@extends( 'layouts.master' )

@section( 'content' )
    <h1>Add a task card</h1>
    <hr>
    <form method="POST" action="/cards">
        {{--  Protects your application from attacks. Generates a CSRF token for 
        each active user session --}}
        {{ csrf_field() }}

        {{--  Task  --}}
        <div class="form-group">
            <label for="task">Task</label>
            <input type="text" class="form-control" id="task" name="task" required>
        </div>

        {{--  Description  --}}
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>
            </textarea>
        </div>

        {{--  Importance  --}}
        <div class="radio">
            <label>
                <input type="radio" name="importance" id="high" 
                    value="high" checked>
                High priority
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="importance" id="low" 
                    value="low">
                Low priority
            </label>
        </div>

        {{--  Deadline  --}}
        
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" id="deadline" 
                name="deadline" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add task</button>
        </div>
    </form>

@endsection