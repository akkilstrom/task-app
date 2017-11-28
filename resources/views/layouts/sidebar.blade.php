<aside>
    <div class="aside-item">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. 
            Cras mattis consectetur purus sit amet fermentum. Aenean lacinia 
            bibendum nulla sed consectetur.
        </p>
    </div>
    @if( isset($archives) )
        <div class="aside-item">
            <h4>Tasks archives</h4>
            <ol class="list-unstyled">
                @foreach($archives as $stats)
                    <li>
                        <a href="/tasks?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                            {{ $stats['month'] . ' ' . $stats['year'] }}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    @endif

    <div class="aside-item">
        <h4>Tags</h4>
        <ol class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="/tasks/tags/{{ $tag }}">
                       #{{ $tag }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</aside><!-- /sidebar -->