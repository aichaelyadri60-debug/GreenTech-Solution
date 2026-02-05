<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">
            <span class="logo-icon">🌿</span>
            <span>Jardin Naturel</span>
        </a>

        <ul class="nav-menu">

            <li>
                <a href="{{ url('/') }}"
                   class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <span class="nav-link-icon"></span>Accueil
                </a>
            </li>

            <li>
                <a href="{{ route('catalog') }}"
                   class="nav-link {{ request()->routeIs('catalog') ? 'active' : '' }}">
                    <span class="nav-link-icon"></span>Catalogue
                </a>
            </li>

            <li>
                <a href="{{ route('categorie') }}"
                   class="nav-link ">
                    <span class="nav-link-icon"></span>Catégories
                </a>
            </li>

            <li>
                <a href="{{ url('/#about') }}"
                   class="nav-link ">
                    <span class="nav-link-icon"></span>À propos
                </a>
            </li>

            <li>
                <a href="{{ route('contact.form') }}"
                   class="nav-link ">
                    <span class="nav-link-icon"></span>Contact
                </a>
            </li>
            @guest
            <li>
            <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' :  (request()->routeIs('registerform')? 'active' : '') }}">
                🔑 Login / Register
            </a>
        </li>
        @endguest
        @auth

        @if(Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('products.index') }}" class="nav-link {{request()->routeIs('products.index')? 'active' :''}}">
                    🛠️ Dashboard
                </a>
            </li>
        @endif

        @if(Auth::user()->role === 'user')
            <li>
                <a href="{{route('favorites')}}" class="nav-link">
                    Favories
                </a>
            </li>
        @endif
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link ">
                     Déconnexion
                </button>
            </form>
        </li>

    @endauth

        </ul>
    </div>
</nav>
