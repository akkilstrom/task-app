    <footer>
        @guest
            <div class="footer-item">
                <h3 class="h3-larger">The Taskboard</h3>
            </div>
        @else
            <div class="footer-item">
                <h3>The Taskboard</h3>
            </div>
            <div class="footer-item">
                <h4>Navigation</h4>
                <a href="/">Dashboard</a> |
                <a href="/projects">Projects</a> |
                <a href="/clients">Clients</a>
            </div>
        @endguest
        <div class="footer-item">
            <a href="#">@include( 'icons.arrow' )</a>
        </div>
        
    </footer>

    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script>
        const filterBtn = $('.filter-btn').click(function() {
            if(this.id == 'all') {
                $('.task-card').fadeIn(450);
            } else {
                let $el = $('.' + this.id).fadeIn(450);
                $('.task-card').not($el).hide();
            }     
        })
        
    </script>
</body>
</html>