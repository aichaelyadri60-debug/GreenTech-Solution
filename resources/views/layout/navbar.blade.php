<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">
            <span class="logo-icon">🌿</span>
            <span>Jardin Naturel</span>
        </a>
        
        <ul class="nav-menu" id="navMenu">
            <li>
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <span class="nav-link-icon">🏠</span>Accueil
                </a>
            </li>

            <li>
                <a href="{{ route('catalog') }}" class="nav-link">
                    <span class="nav-link-icon">🌱</span>Catalogue
                </a>
            </li>

            <li>
                <a href="#categories" class="nav-link">
                    <span class="nav-link-icon">📂</span>Catégories
                </a>
            </li>

            <li>
                <a href="#about" class="nav-link">
                    <span class="nav-link-icon">ℹ️</span>À propos
                </a>
            </li>

            <li>
                <a href="#contact" class="nav-link">
                    <span class="nav-link-icon">📧</span>Contact
                </a>
            </li>

            @auth
                <li>
                    <a href="{{ route('login') }}" class="nav-link">
                        <span class="nav-link-icon">🔑</span>Connexion
                    </a>
                </li>
            @endauth
        </ul>
        
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
