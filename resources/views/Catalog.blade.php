<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - Jardin Naturel</title>
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    @include('layout.navbar')

    <!-- Catalog Page -->
    <div class="catalog-page">
        <div class="container">
            
            <!-- Page Header -->
            <div class="page-header">
                <div class="header-content">
                    <h1 class="page-title">🌱 Notre Catalogue</h1>
                    <p class="page-subtitle">Découvrez nos produits pour un jardinage naturel et bio</p>
                </div>
                <div class="header-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalProducts ?? 0 }}</span>
                        <span class="stat-label">Produits</span>
                    </div>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="catalog-toolbar">
                <p class="results-count">
                    @if(isset($products) && $products->total() > 0)
                        {{ $products->total() }} produit(s) trouvé(s)
                    @else
                        Aucun produit trouvé
                    @endif
                </p>

                <form method="GET" action="{{ route('catalog') }}" class="search-form">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="🔍 Rechercher..." class="search-input">
                    <button type="submit" class="search-btn">Rechercher</button>
                </form>

                <form method="GET" action="{{ route('catalog') }}" class="sort-form">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    
                    <label for="sort">Trier:</label>
                    <select name="sort" id="sort" onchange="this.form.submit()" class="sort-select">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Plus récents</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix ↑</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix ↓</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nom A-Z</option>
                    </select>
                </form>
            </div>

            <!-- Products Grid -->
            @if(isset($products) && count($products) > 0)
            <div class="products-grid">
                @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product->category_id == 1)
                            <span class="product-emoji">🌿</span>
                        @elseif($product->category_id == 2)
                            <span class="product-emoji">🌱</span>
                        @else
                            <span class="product-emoji">🔧</span>
                        @endif
                        
                        @if($product->stock <= 10 && $product->stock > 0)
                            <span class="product-badge badge-warning">⚠️ Stock limité</span>
                        @elseif($product->stock == 0)
                            <span class="product-badge badge-danger">❌ Rupture</span>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <span class="product-category">
                            @if($product->category_id == 1)
                                🌿 Plantes
                            @elseif($product->category_id == 2)
                                🌱 Graines
                            @else
                                🔧 Outils
                            @endif
                        </span>
                        
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                        
                        <div class="product-footer">
                            <div>
                                <div class="product-price">{{ number_format($product->price, 2) }} €</div>
                                <div class="product-stock">
                                    @if($product->stock > 0)
                                        ✓ {{ $product->stock }} en stock
                                    @else
                                        ✗ Rupture
                                    @endif
                                </div>
                            </div>
                            @if($product->stock > 0)
                            <form method="POST" action="{{ route('favorites.toggle', $product) }}">
                                @csrf
                                <button 
                                type="submit" 
                                class="favorite-btn {{ in_array($product->id, $favoriteIds) ? 'favorited' : '' }}"
                                >
                                ♥
                            </button>
                        </form>


                            @else
                                <button class="add-btn" disabled>✗</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $products->links() }}
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">🌱</div>
                <h3 class="empty-title">Aucun produit trouvé</h3>
                <p class="empty-text">
                    @if(request('search'))
                        Aucun résultat pour "{{ request('search') }}"
                    @else
                        Aucun produit disponible
                    @endif
                </p>
                <a href="{{ route('catalog') }}" class="btn-primary">Voir tous</a>
            </div>
            @endif

        </div>
    </div>

    @include('layout.footer')

    <script>
        function toggleMenu() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        }

        document.querySelectorAll('.add-btn:not([disabled])').forEach(btn => {
            btn.addEventListener('click', function() {
                this.innerHTML = '✓';
                this.style.background = '#43a047';
                setTimeout(() => {
                    this.innerHTML = '⭐';
                    this.style.background = '';
                }, 1500);
            });
        });
    </script>

</body>
</html>