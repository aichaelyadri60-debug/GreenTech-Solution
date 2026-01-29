<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
</head>
<body>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <a href="{{ route('products.index') }}" class="close-btn">✖</a>
    <h2>✨ Ajouter un produit</h2>
    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.alert-success').style.display ='none';
        }, 3000);
    </script>
    @endif

    <label for="name">Nom du produit</label>
    <input type="text" id="name" name="name" placeholder="Ex: Rose rouge" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="Décrivez votre produit..." required></textarea>

    <label for="price">Prix (€)</label>
    <input type="number" id="price" step="0.01" name="price" placeholder="0.00" required>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" placeholder="Quantité disponible" required>

    <label for="category">Catégorie</label>
    <select id="category" name="category_id" required>
        <option value="">-- Choisir une catégorie --</option>
        <option value="1">🌿 Plantes</option>
        <option value="2">🌱 Graines</option>
        <option value="3">🔧 Outils</option>
    </select>

    <button type="submit">Créer le produit</button>
</form>

</body>
</html>