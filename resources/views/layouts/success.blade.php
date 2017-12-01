@if( $flash = session('message') )
    @guest
        <div class="success-container-center">
    @else
        <div class="success-container">
    @endguest
            {{ $flash }}
        </div>
@endif