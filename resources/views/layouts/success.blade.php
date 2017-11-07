@if( $flash = session('message') )
    <div class="success-container">
        {{ $flash }}
    </div>
@endif