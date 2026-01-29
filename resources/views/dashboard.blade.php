<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Jardin Naturel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>


<div class="nature-bg">
    <span class="nature-icon icon-1">🌿</span>
    <span class="nature-icon icon-2">🌸</span>
    <span class="nature-icon icon-3">🌺</span>
    <span class="nature-icon icon-4">🍀</span>
    <span class="nature-icon icon-5">🦋</span>
    <span class="nature-icon icon-6">🌱</span>
</div>

<div class="dashboard-container">
    

    <header class="dashboard-header">
        <div class="dashboard-title">
            <span class="icon">🌿</span>
            <h1>Tableau de Bord Admin</h1>
        </div>
        <div class="header-actions">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                ➕ Ajouter un produit
            </a>

                <button type="submit" class="btn btn-secondary">
                    🚪 Déconnexion
                </button>
        </div>
    </header>


    @if(session('success'))
    <div class="alert alert-success">
        <span>✓</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        <span>✗</span>
        <span>{{ session('error') }}</span>
    </div>
    @endif


    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
                    <div class="stat-label">Total Produits</div>
                </div>
                <div class="stat-icon">📦</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-value">{{ $totalStock ?? 0 }}</div>
                    <div class="stat-label">Articles en Stock</div>
                </div>
                <div class="stat-icon">📊</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-value">{{ $categories ?? 3 }}</div>
                    <div class="stat-label">Catégories</div>
                </div>
                <div class="stat-icon">📂</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-value">{{ $lowStock ?? 0 }}</div>
                    <div class="stat-label">Stock Faible</div>
                </div>
                <div class="stat-icon">⚠️</div>
            </div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h2>🌱 Liste des Produits</h2>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="🔍 Rechercher un produit..." oninput="searchProducts(this.value)">
            </div>
        </div>

        @if(isset($products) && count($products) > 0)
        <div id="table-data">
            @include('products._table', ['products' => $products])
        </div>

        @else
        <div class="empty-state">
            <div class="empty-state-icon">🌱</div>
            <h3>Aucun produit disponible</h3>
            <p>Commencez par ajouter votre premier produit à votre catalogue</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                ➕ Ajouter un produit
            </a>
        </div>
        @endif
    </div>

</div>


<div class="modal" id="deleteModal">
    <div class="modal-content">
        <div class="modal-header">
            <span style="font-size: 2rem;">⚠️</span>
            <h3>Confirmer la suppression</h3>
        </div>
        <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer le produit <strong id="productName"></strong> ?</p>
            <p style="color: #c62828; font-weight: 600;">Cette action est irréversible.</p>
        </div>
        <div class="modal-actions">
            <button onclick="closeModal()" class="btn btn-secondary">
                ✗ Annuler
            </button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    🗑️ Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

<script>

function closeModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s ease';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
});
</script>


<script>
document.addEventListener('click', function (e) {
    if (e.target.closest('.pagination a')) {
        e.preventDefault();

        const url = e.target.closest('a').getAttribute('href');

        fetch(url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('table-data').innerHTML = html;
            window.history.pushState({}, '', url);
        });
    }
});
</script>

</body>
</html>