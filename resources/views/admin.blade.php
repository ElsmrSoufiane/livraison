@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<style>
        :root {
            --primary: #2A2F4F;
            --secondary: #bb7d00;
            --accent:  #d47d63f3;
            --background:  #f4bd66f3;
        }
        #f35525
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
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            padding: 5px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            display: flex;
            width: 100%;
            margin-top:10px;
            justify-content: space-evenly;
        }

        .logo {
            font-size: 26px;
            color: var(--primary);
            margin-bottom: 40px;
            padding: 10px;
            border-bottom: 2px solid var(--accent);
        }

        .nav-item {
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            color: var(--primary);
        }

        .nav-item:hover {
            background: var(--background);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            display: grid;
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        h2 {
            color: var(--primary);
            margin-bottom: 25px;
            font-size: 22px;
        }

        /* Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary);
            font-weight: 500;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input:focus, select:focus {
            border-color: var(--secondary);
            outline: none;
        }

        .btn {
            background: var(--secondary);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn:hover {
            background: var(--primary);
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
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
        }

        .table td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        .status-btn {
            padding: 6px 12px;
            border-radius: 20px;
            background: var(--accent);
            color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                padding: 20px;
            }
            
            .main-content {
                padding: 20px;
            }
            
            .table td {
                padding: 8px;
                font-size: 14px;
            }
            
            .btn {
                padding: 10px 20px;
            }
        }

        @media (max-width: 480px) {
            input, select, textarea {
                font-size: 14px;
            }
            
            .table {
                display: block;
            }
            
            .table tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 15px;
                border: 1px solid #eee;
                border-radius: 8px;
            }
            
            .table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .table td::before {
                content: attr(data-label);
                font-weight: bold;
                margin-right: 15px;
                color: var(--primary);
            }
        }
    </style>

@include('adminnav')
    <div class="main-content">
        <!-- Section Ajout Produit -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <h2>Ajouter Produit</h2>
            <form class="form-grid" action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
            
                <div class="input-group">
                    <label>Nom du produit</label>
                    <input name='Nom_du_produit' type="text" required>
                </div>
                <div class="input-group">
                    <label>Prix</label>
                    <input name='Prix' type="number" step="0.01" required>
                </div>
                <div class="input-group">
                    <label>Fournisseur</label>
                    <select name='Fournisseur' required>
                       @foreach($fournisseurs as $fournisseur)
                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label>Catégorie</label>
                    <select name='Catégorie' required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label>Image</label>
                    <input name='image' type="file" accept="image/*">
                </div>
                <button class="btn">Ajouter Produit</button>
            </form>
        </div>

        <!-- Section Points de vente -->
         
        <div class="card">
            <h2>Ajouter Point de vente</h2>
            <form class="form-grid" action="{{ route('pointdeventes.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
          
                <div class="input-group">
                    <label>Nom</label>
                    <input name='Nom'  type="text" required>
                </div>
                <div class="input-group">
                    <label>Localisation</label>
                    <input name='Localisation' type="text" required>
                </div>
                <div class="input-group">
                    <label>Description</label>
                    <textarea name='Description' rows="3"></textarea>
                </div>
               
                <div class="input-group">
                    <label>Catégorie</label>
                    <select name='Catégorie' required>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label>image</label>
                    <input name='image' type="file" accept="image/*">
                </div>
                <button class="btn">Enregistrer</button>
            </form>
        </div>

        <!-- Section Commandes -->
        <div class="card">
            <h2>Commandes récentes</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>numero</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Client">Karim Benjelloun</td>
                            <td data-label="Produit">Produit X</td>
                            <td data-label="Quantité">2</td>
                            <td data-label="Total">450 MAD</td>
                            <td data-label="Total">066666666</td>
                            <td data-label="Adresse">Casablanca</td>
                            <td><button class="btn">Confirmer</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section Livreurs -->
        <div class="card">
            <h2>Gestion Livreurs</h2>
            <form   class="form-grid" action="{{ route('livreurs.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div class="input-group">
                    <label>Nom_complet</label>
                    <input name='nom' type="text" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input name='email' type="email" required>
                </div>
                <div class="input-group">
                    <label>Mot de passe</label>
                    <input name='mot_de_passe' type="password" required>
                </div>
                <div class="input-group">
                    <label>Adresse</label>
                    <input name='address' type="text" required>
                </div>
                <div class="input-group">
                    <label>Téléphone</label>
                    <input name='numero' type="tel" required>
                </div>
                <button class="btn">Ajouter Livreur</button>
            </form>
        </div>
    </div>
@endsection
