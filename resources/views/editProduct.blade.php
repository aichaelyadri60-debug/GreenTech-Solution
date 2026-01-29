<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
</head>
<body>

<form action="{{ route('products.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <a href="{{ route('products.index') }}" class="close-btn">✖</a>

    <h2>✏️ Modifier le produit</h2>

    <label for="name">Nom du produit</label>
    <input type="text" id="name" name="name" value="{{ $item->name }}" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" required>{{ $item->description }}</textarea>

    <label for="price">Prix (€)</label>
    <input type="number" id="price" step="0.01" name="price" value="{{ $item->price }}" required>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" value="{{ $item->stock }}" required>

    <label for="category">Catégorie</label>
    <select id="category" name="category_id" required>
        <option value="1" {{ $item->category_id == 1 ? 'selected' : '' }}>🌿 Plantes</option>
        <option value="2" {{ $item->category_id == 2 ? 'selected' : '' }}>🌱 Graines</option>
        <option value="3" {{ $item->category_id == 3 ? 'selected' : '' }}>🔧 Outils</option>
    </select>

    <button type="submit">Mettre à jour</button>
</form>

</body>
</html>