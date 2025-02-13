<header class="header">
    <div class="head">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logos/SQ1_Academy.svg') }}" alt="logo">
            </a>
        </div>
        <div class="head_nav">
            <div class="search">
                <a href="#" id="search-toggle"><img src="{{ asset('images/logos/look.png') }}" alt="search"></a>
            </div>

            <div class="account">
                @auth
                    <div class="dropdown">
                        <button class="dropdown-btn">
                            <img src="{{ asset('images/logos/person.png') }}" alt="account">
                        </button>
                        <div class="dropdown-content">
                            <a href="{{ route('account') }}">My Account</a>
                            <a href="{{ route('orders') }}">My Orders</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"><img src="{{ asset('images/logos/person.png') }}" alt="Login"></a>
                @endauth
            </div>

            <div class="cart">
                <a href="{{ route('cart.index') }}"><img src="{{ asset('images/logos/basket.png') }}" alt="Cart"></a>
            </div>
        </div>
    </div>

    <!-- Search Bar (Initially Hidden) -->
    <div class="search-bar-container">
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search products..." required>
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="navbar">
        <nav>
            <ul>
                <li><a href="{{ route('shop', ['category' => 'women']) }}">WOMEN</a></li>
                <li><a href="{{ route('shop', ['category' => 'kids']) }}">KIDS</a></li>
                <li><a href="{{ route('shop', ['category' => 'accessories']) }}">ACCESSORIES</a></li>
                <li><a href="{{ route('about') }}">ABOUT US</a></li>
                <li><a href="{{ route('news') }}">NEWS</a></li>
                <li><a href="{{ route('contact') }}">CONTACT US</a></li>
            </ul>
        </nav>
    </div>
</header>
