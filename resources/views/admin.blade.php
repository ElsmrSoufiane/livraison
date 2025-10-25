@extends("master")
@section("title")
Les meilleurs restaurants et pâtisseries de Fès
@endsection

@section("content")

<style>
    :root {
        --primary: #2A2F4F;
        --secondary: #bb7d00;
        --accent: #d47d63f3;
        --background: #f4bd66f3;
        --white: #ffffff;
        --light-gray: #f5f5f5;
        --dark-gray: #333333;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: var(--background);
        color: var(--dark-gray);
    }

    /* Navigation */
    .admin-nav {
        background: var(--primary);
        color: white;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .nav-logo {
        font-size: 24px;
        font-weight: bold;
    }

    .nav-user {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Main Layout */
    .dashboard-container {
        display: flex;
        flex: 1;
    }

    /* Sidebar */
    .sidebar {
        width: 280px;
        background: var(--white);
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
    }

    .sidebar-menu {
        list-style: none;
        margin-top: 30px;
    }

    .menu-item {
        padding: 15px;
        margin: 8px 0;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        color: var(--primary);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .menu-item:hover, .menu-item.active {
        background: var(--background);
        color: var(--primary);
    }

    .menu-item i {
        font-size: 20px;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        padding: 30px;
        display: grid;
        gap: 25px;
    }

    .card {
        background: var(--white);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .card-title {
        color: var(--primary);
        font-size: 22px;
        font-weight: 600;
    }

    /* Form Styles */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: var(--primary);
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: var(--secondary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(187, 125, 0, 0.2);
    }

    /* Button Styles */
    .btn {
        background: var(--secondary);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 16px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn:hover {
        background: var(--primary);
        transform: translateY(-2px);
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 14px;
    }

    .btn-danger {
        background: #dc3545;
    }

    .btn-danger:hover {
        background: #c82333;
    }

    /* Table Styles */
    .table-responsive {
        overflow-x: auto;
        border-radius: 10px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th {
        background: var(--primary);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 500;
    }

    .table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover td {
        background: rgba(244, 189, 102, 0.1);
    }

    .table-actions {
        display: flex;
        gap: 8px;
    }

    /* Alert Styles */
    .alert {
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-left: 4px solid #dc3545;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: var(--white);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .stat-title {
        font-size: 14px;
        color: var(--dark-gray);
    }

    .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: var(--primary);
    }

    .stat-change {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }

    .stat-change.up {
        color: #28a745;
    }

    .stat-change.down {
        color: #dc3545;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .sidebar {
            width: 250px;
        }
    }

    @media (max-width: 992px) {
        .dashboard-container {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            flex-direction: row;
            overflow-x: auto;
            padding: 15px;
        }
        
        .sidebar-menu {
            display: flex;
            margin-top: 0;
            gap: 10px;
        }
        
        .menu-item {
            white-space: nowrap;
            margin: 0;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .table td, .table th {
            padding: 10px;
            font-size: 14px;
        }
        
        .btn {
            padding: 10px 20px;
        }
        
        .card {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .table-responsive {
            border-radius: 0;
        }
        
        .table tr {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 10px;
        }
        
        .table td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: none;
            padding: 8px 0;
        }
        
        .table td::before {
            content: attr(data-label);
            font-weight: bold;
            margin-right: 15px;
            color: var(--primary);
        }
        
        .table-actions {
            justify-content: flex-end;
            margin-top: 10px;
        }
    }
</style>

<div class="admin-nav">
    <div class="nav-logo">RapidoClick</div>
    <div class="nav-user">
        
      <span><a class="btn" href="/produits">gestion des produits</a></span>
      <span><a class="btn" href="/pointdeventes">gestion des fournisseur</a></span>
      <span><a class="btn" href="/livreurs">gestion des livreurs</a></span>
       
    </div>
</div>

<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li class="menu-item " data-section="produits">
                
                <span>Produits</span>
            </li>
            
            <li class="menu-item active" data-section="commandes">
                <i class="fas fa-shopping-cart"></i>
                <span>Commandes</span>
            </li>
            <li class="menu-item" data-section="livreurs">
                <i class="fas fa-motorcycle"></i>
                <span>Livreurs</span>
            </li>
            <li class="menu-item" data-section="statistiques">
                <i class="fas fa-chart-line"></i>
                <span>Statistiques</span>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                <strong>Erreurs de validation :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- Section Statistiques -->
        <section id="statistiques" class="card" style="display: none;">
            <div class="card-header">
                <h2 class="card-title">Statistiques</h2>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-title">Commandes ce mois</div>
                    <div class="stat-value">142</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>12% vs mois dernier</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-title">Revenu total</div>
                    <div class="stat-value">24,580 MAD</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>8% vs mois dernier</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-title">Nouveaux clients</div>
                    <div class="stat-value">36</div>
                    <div class="stat-change down">
                        <i class="fas fa-arrow-down"></i>
                        <span>5% vs mois dernier</span>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-title">Satisfaction</div>
                    <div class="stat-value">94%</div>
                    <div class="stat-change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>2% vs mois dernier</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Produits -->
        <section id="produits" class="card">
            <div class="card-header">
                <h2 class="card-title">Ajouter Produit</h2>
            </div>
            <form class="form-grid" action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <label class="form-label">Nom du produit</label>
                    <input class="form-control" name="Nom_du_produit" type="text" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Prix</label>
                    <input class="form-control" name="Prix" type="number" step="0.01" required>
                </div>
               
                <div class="input-group">
                    <label class="form-label">Catégorie</label>
                    <select class="form-control" name="Catégorie" required>
                        @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label class="form-label">Image</label>
                    <input class="form-control" name="image" type="file" accept="image/*">
                </div>
                <button type="submit" class="btn">
                    <i class="fas fa-plus-circle"></i>
                    Ajouter Produit
                </button>
            </form>
        </section>

        <!-- Section Points de vente -->
      
        <!-- Section Commandes -->
        <section id="commandes" class="card" style="display: none;">
            <div class="card-header">
                <h2 class="card-title">Commandes récentes</h2>
                <button class="btn btn-sm">
                    <i class="fas fa-download"></i>
                    Exporter
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commandes as $commande)
                        @if($commande->etat == "en attente")
                        <tr>
                           
                            <td data-label="Client">{{$commande->client->nom}}</td>
                          
                            
                            <td data-label="Produit">{{$commande->produit->nom}}</td>
                           

                            <td data-label="Quantité">{{$commande->quantite}}</td>
                            <td data-label="Total">{{$commande->prix_total}} MAD</td>
                            <td data-label="Contact">{{$commande->numero}}</td>
                            <td data-label="Adresse">{{$commande->address}}</td>
                            <td data-label="Actions">
                                <div class="table-actions">
                                    <a href="/confirmer/{{$commande->id}}" class="btn btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="/suprimercommande/{{$commande->id}}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Section Livreurs -->
        <section id="livreurs" class="card" style="display: none;">
            <div class="card-header">
                <h2 class="card-title">Gestion Livreurs</h2>
            </div>
            <form class="form-grid" action="{{ route('livreurs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <label class="form-label">Nom complet</label>
                    <input class="form-control" name="nom" type="text" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email" type="email" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Mot de passe</label>
                    <input class="form-control" name="mot_de_passe" type="password" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Adresse</label>
                    <input class="form-control" name="address" type="text" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Téléphone</label>
                    <input class="form-control" name="numero" type="tel" required>
                </div>
                <button type="submit" class="btn">
                    <i class="fas fa-user-plus"></i>
                    Ajouter Livreur
                </button>
            </form>
        </section>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Navigation entre les sections
        const menuItems = document.querySelectorAll('.menu-item');
        const sections = document.querySelectorAll('main section');
        
        function showSection(sectionId) {
            sections.forEach(section => {
                if (section.id === sectionId) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
            
            // Mettre à jour l'état actif du menu
            menuItems.forEach(item => {
                if (item.dataset.section === sectionId) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }
        
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                const sectionId = this.dataset.section;
                showSection(sectionId);
            });
        });
        
        // Afficher la section Produits par défaut
        showSection('commandes');
        
        // Intégration des icônes Font Awesome
        const faScript = document.createElement('script');
        faScript.src = 'https://kit.fontawesome.com/a076d05399.js';
        faScript.crossOrigin = 'anonymous';
        document.head.appendChild(faScript);
    });
</script>

@endsection
