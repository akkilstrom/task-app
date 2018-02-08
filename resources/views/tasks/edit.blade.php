@extends( 'layouts.master' )

@section( 'content' )
    <h1>Edit task</h1>
	<form action="{{ route('tasks.update', ['id' => $task->id]) }}" 
		method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
		{{ method_field('PUT') }}

        {{--  Task  --}}
        <div class="form-group">
            <label for="task">Task</label>
            <input type="text" class="form-control" id="task" name="task" 
				value="{{ $task->task }}" required >
        </div>

        {{--  Description  --}}
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" 
				value="{{ $task->description }}" required>
            </textarea>
        </div>

        {{--  Project --}} 
        <div class="form-group">
            <label for="project_id">Project</label>
            <select id="project_id" name="project_id" class="form-control" required> <!--Supplement an id here instead of using 'name'-->
                @foreach($allProjects as $project)
                    <option value="{{ $project->id }}"
						@if($project->id === $selectedProject->id)
							selected="selected" 
						@endif>
						{{ $project->name }}
					</option> 
                @endforeach
            </select>
        </div>

        {{--  Status --}} 
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control" required> <!--Supplement an id here instead of using 'name'-->
				<option value="0">To do</option> 
				<option value="1">In progress</option> 
				<option value="2">In review</option> 
				<option value="3">Done</option> 
            </select>
        </div>

        {{--  Level of effort --}} 
        <div class="form-group">
            <label for="level_of_effort">Level of effort</label>
            <select id="level_of_effort" name="level_of_effort" class="form-control" required>
                <option value="0">Light</option> 
                <option value="1">Medium</option> 
                <option value="2">Difficult</option>
            </select>
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
                name="deadline" value="{{ $task->deadline }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add task</button>
        </div>
    </form>

@endsection