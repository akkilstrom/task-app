@if(count($errors))
    <div class="error-container">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
