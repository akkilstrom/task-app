@include( 'layouts.header' )

<main role="main" class="container" id="app">

    <div class="row">
        <div class="col-sm-8 blog-main">
            @include( 'layouts.error' )
            @include( 'layouts.success' )
            @yield( 'content' )
        </div>

        @include( 'layouts.sidebar' )
    </div><!-- /.row -->

</main><!-- /.container -->
@include( 'layouts.footer' )
    
