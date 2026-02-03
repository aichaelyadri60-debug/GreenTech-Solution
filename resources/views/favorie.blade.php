<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris - Jardin Naturel</title>

    <link rel="stylesheet" href="{{ asset('css/favories.css') }}">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> -->

 
</head>
<body>

@include('layout.navbar')

<div class="catalog-page">
    <div class="container">

        <!-- Header -->
        <div class="page-header">
            <div class="header-content">
                <h1 class="page-title">💚 Mes Favoris</h1>
                <p class="page-subtitle">Les produits que vous aimez pour un jardin naturel</p>
            </div>
        </div>

        <!-- Favoris -->
        @if($products->count() > 0)
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
                            <p class="product-description">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <div class="product-footer">
                                <div>
                                    <div class="product-price">
                                        {{ number_format($product->price, 2) }} €
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('favorites.toggle', $product) }}">
                                    @csrf
                                    <button type="submit" class="favorite-btn" title="Retirer des favoris">
                                        ♥
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">🌱</div>
                <h3>Aucun favori</h3>
                <p>Vous n’avez encore ajouté aucun produit à vos favoris.</p>
                <a href="{{ route('catalog') }}" class="btn-primary">
                    Voir le catalogue
                </a>
            </div>
        @endif

    </div>
</div>

@include('layout.footer')

</body>
</html>
