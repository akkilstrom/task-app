@include( 'layouts.header' )

<main role="main" class="container" id="app">
    
    @include( 'layouts.error' )
    @include( 'layouts.success' )
    @yield( 'content' )

</main><!-- /.container -->
@include( 'layouts.footer' )
    