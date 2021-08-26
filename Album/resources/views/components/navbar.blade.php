<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">
        Album
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::path() == '/' ? 'active' : ''}}">
                <a href="/" class="nav-link">
                    <i class="fas fa-camera-retro"></i>
                    Pictures
                </a>
            </li>
            <li class="nav-item {{ Request::path() == 'add' ? 'active' : ''}}">
                <a href="/add" class="nav-link">
                    <i class="fas fa-plus-circle"></i>
                    Add Picture
                </a>
            </li>
        </ul>
    </div>
</nav>