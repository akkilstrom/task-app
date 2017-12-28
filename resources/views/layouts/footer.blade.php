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
                <a href="/">Home</a> |
                <a href="/projects">Projects</a> |
                <a href="/clients">Clients</a>
            </div>
            {{-- <div class="footer-item">
                <h4>Elsewhere</h4>
                <a href="#">GitHub</a> |
                <a href="#">Instagram</a> |
                <a href="#">Facebook</a>
                </ol>
            </div> --}}
        @endguest
        <div class="footer-item">
            <a href="#">@include( 'icons.arrow' )</a>
        </div>
        
    </footer>

    <script src="/js/app.js"></script>
</body>
</html>