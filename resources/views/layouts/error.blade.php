@if(count($errors))
    @guest
        <div class="error-container-center">
    @else
        <div class="error-container">
    @endguest
            <ul class="list-unstyled">
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
