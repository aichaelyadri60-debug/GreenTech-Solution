<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jardin Naturel - Votre boutique de jardinage bio</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    @include('layout.navbar')

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="hero-title">🌿 Cultivez Votre Paradis Vert 🌸</h1>
            <p class="hero-subtitle">
                Découvrez notre sélection de plantes biologiques, graines naturelles et outils de jardinage pour créer votre oasis de verdure.
            </p>
            <div class="hero-buttons">
                <a href="#catalogue" class="btn btn-primary">
                    🌱 Découvrir le catalogue
                </a>
                <a href="#categories" class="btn btn-secondary">
                    📂 Explorer les catégories
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <h2 class="section-title">
            <span>📂</span>
            <span>Nos Catégories</span>
        </h2>
        
        <div class="categories-grid">
            <div class="category-card" onclick="filterProducts(1)">
                <span class="category-icon">🌿</span>
                <h3 class="category-name">Plantes</h3>
                <p class="category-description">
                    Plantes d'intérieur et d'extérieur, cultivées avec amour
                </p>
                <span class="category-count">{{ $plantsCount ?? 0 }} produits</span>
            </div>

            <div class="category-card" onclick="filterProducts(2)">
                <span class="category-icon">🌱</span>
                <h3 class="category-name">Graines</h3>
                <p class="category-description">
                    Graines biologiques pour un potager naturel
                </p>
                <span class="category-count">{{ $seedsCount ?? 0 }} produits</span>
            </div>

            <div class="category-card" onclick="filterProducts(3)">
                <span class="category-icon">🔧</span>
                <h3 class="category-name">Outils</h3>
                <p class="category-description">
                    Outils de jardinage de qualité professionnelle
                </p>
                <span class="category-count">{{ $toolsCount ?? 0 }} produits</span>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="categories" id="about" style="background: white;">
        <h2 class="section-title">
            <span>🌸</span>
            <span>Pourquoi Nous Choisir ?</span>
        </h2>
        
        <div class="categories-grid">
            <div class="category-card">
                <span class="category-icon">🌿</span>
                <h3 class="category-name">100% Bio</h3>
                <p class="category-description">
                    Tous nos produits sont certifiés biologiques et respectueux de l'environnement
                </p>
            </div>

            <div class="category-card">
                <span class="category-icon">🚚</span>
                <h3 class="category-name">Livraison Rapide</h3>
                <p class="category-description">
                    Expédition en 24-48h pour que vos plantes arrivent en parfait état
                </p>
            </div>

            <div class="category-card">
                <span class="category-icon">💚</span>
                <h3 class="category-name">Conseil Expert</h3>
                <p class="category-description">
                    Notre équipe de jardiniers passionnés est là pour vous guider
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layout.footer')

    <!-- JavaScript -->
   

</body>
</html>