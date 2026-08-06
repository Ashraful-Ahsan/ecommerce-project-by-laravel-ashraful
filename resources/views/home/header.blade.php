<style>
    /* Default styles */
.nav-item a {
    color: #000; /* Normal text color */
    transition: 0.3s;
}

/* Hover effect */
.nav-item a:hover {
    color: #ff6600 !important; /* Change color on hover */
    font-weight: bold;
}

/* Active link effect */
.nav-item.active a {
    color: #11ad72 !important; /* Keep active link highlighted */
    font-weight: bold;
    border-bottom: 2px solid #ff6600; /* Underline active link */
}

</style>



<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span>Ahsan Gift Shop</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ request()->is('why') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('why') }}">Why Us</a>
                </li>
                <li class="nav-item {{ request()->is('testimonial') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('testimonial') }}">Testimonial</a>
                </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                </li>
            </ul>

            <div class="user_option">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('myorders') }}">My Orders</a>

                        <a href="{{ url('mycart') }}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            [{{ $count }}]
                        </a>

                        <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input class="btn btn-success" type="submit" value="Logout">
                        </form>
                    @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>

                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>Register</span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>


