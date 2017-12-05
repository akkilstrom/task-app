@include( 'layouts.header' )

<main role="main" id="app">

    @include( 'layouts.error' )
    @include( 'layouts.success' )
    @yield( 'content' )

    {{--  @include( 'layouts.sidebar' )  --}}

</main><!-- /.container -->
@include( 'layouts.footer' )
    
