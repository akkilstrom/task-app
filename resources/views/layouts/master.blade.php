@include( 'layouts.header' )

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main">
            @include( 'layouts.error' )
            @yield( 'content' )
        </div>

        @include( 'layouts.sidebar' )
    </div><!-- /.row -->

</main><!-- /.container -->
@include( 'layouts.footer' )
    
