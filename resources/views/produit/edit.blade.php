
<style>
        :root {
              --primary:rgb(247, 121, 37);
        --primary-dark:rgb(197, 4, 4);
        --accent:rgb(247, 125, 37);
        --light: #f8f9fa;
            --background: #f0f0f0;
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
            color: black;
            padding: 12px 30px;
            border: var(--primary) 1px solid;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn:hover {
            background: var(--primary);
            color: white;
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

    


     @extends("master")
@section("title")
Les meilleurs restaurants et pâtisseries de Fès
@endsection

@section("content")
<div class="main-content">
    <!-- Section Modification Produit -->
    <div class="card">
        <h2>Modifier Produit</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-grid" action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="input-group">
                <label>Nom du produit</label>
                <input type="text" name="nom_de_produit" value="{{ old('nom_de_produit', $produit->nom) }}" required>
                @error('nom_de_produit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" value="{{ old('prix', $produit->prix) }}" required>
                @error('prix')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Catégorie</label>
                <select name="categorie" required>
                    <option value="">Choisir catégorie</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" 
                            {{ old('categorie', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->categorie }}
                        </option>
                    @endforeach
                </select>
                @error('categorie')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="input-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
                @if($produit->image)
                    <div class="mt-2">
                        <img src="{{ $produit->image }}" alt="Image actuelle" width="100">
                        <p class="text-muted">Image actuelle</p>
                    </div>
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="btn">Modifier Produit</button>
                <a href="{{ route('produits.index') }}" class="btn" style="background: var(--primary)">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
