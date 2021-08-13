<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            <img src="{{ asset('img/user.png') }}" alt="Registry" width="100" height="100"
                class="d-inline-block mr-1">
            <span>Users</span>
        </a>
        @if(session()->has('login'))
        <span class="navbar-text">
            <a href="{{ route('logout') }}">
                <i class="fas fa-power-off text-danger"></i>
            </a>
        </span>
        @endif
    </div>
</nav>