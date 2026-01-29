

<table class="products-table" id="productsTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Produit</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>#{{ $product->id }}</td>
                    <td class="product-name">{{ $product->name }}</td>
                    <td>
                        @if($product->category_id == 1)
                            <span class="category-badge category-plantes">🌿 Plantes</span>
                        @elseif($product->category_id == 2)
                            <span class="category-badge category-graines">🌱 Graines</span>
                        @else
                            <span class="category-badge category-outils">🔧 Outils</span>
                        @endif
                    </td>
                    <td class="price">{{ number_format($product->price, 2) }} €</td>
                    <td>
                        @if($product->stock > 20)
                            <span class="stock-badge stock-high">{{ $product->stock }} unités</span>
                        @elseif($product->stock > 10)
                            <span class="stock-badge stock-medium">{{ $product->stock }} unités</span>
                        @else
                            <span class="stock-badge stock-low">{{ $product->stock }} unités</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                ✏️ Modifier
                            </a>
                            <button onclick="confirmDelete({{ $product->id }}, '{{ $product->name }}')" class="btn btn-danger btn-sm">
                                🗑️ Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="pagination-container">
                {{ $products->links() }}
            </div>