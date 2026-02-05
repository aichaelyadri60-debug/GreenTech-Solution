<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="{{ asset('css/category.css') }}">

</head>
<body>
    @include('layout.navbar')
    {{-- Produits --}}
    @if(isset($products))
    <h2>Produits – {{ $category->name }}</h2>

    <div class="grid">
        @forelse($products as $product)
            <div class="product-card">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} €</p>
            </div>
        @empty
            <p>Aucun produit 🌱</p>
        @endforelse
    </div>
@endif
 @include('layout.footer')
</body>
</html>



