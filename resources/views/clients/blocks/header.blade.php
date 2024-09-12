<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ isset($activePage) && $activePage == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ isset($activePage) && $activePage == 'products' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('products') }}">Products</a>
            </li>
            <li class="nav-item {{ isset($activePage) && $activePage == 'contact' ? 'active' : '' }}">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item {{ isset($activePage) && $activePage == 'chat' ? 'active' : '' }}">
                <a class="nav-link" href="#">Chat</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="userDropdown" role="button">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">My Account</a>
                        <a class="dropdown-item" href="#">My Order</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit" style="border: none; outline: none; ">
                                Log Out
                            </button>
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login-form') }}"><i class="fa-solid fa-user"></i></a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>
        </ul>
    </div>
</nav>
