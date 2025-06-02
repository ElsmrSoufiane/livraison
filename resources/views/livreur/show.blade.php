@extends("master")
@section("title")
Gestion des livreurs
@endsection

@section("content")
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

<div class="main-content">
    @include('adminnav')

    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <h1 class="text-center">Les commandes de {{ $livreur->nom }}</h1>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Produit</th>
                        <th>Point de vente</th>
                        <th>Prix total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        
                            <tr>
                                @foreach($paniers as $panier)
                                    @if($panier->id == $commande->id_panier)
                                        @foreach($comptes as $compte)
                                            @if($compte->id == $panier->id_client)
                                                <td>{{ $compte->nom }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                <td>{{ $commande->created_at }}</td>
                                
                                @foreach($produits as $produit)
                                    @if($produit->id == $commande->id_produit)
                                        <td>{{ $produit->nom }}</td>
                                        @foreach($fournisseurs as $fournisseur)
                                            @if($fournisseur->id == $produit->fournisseur_id)
                                                <td>{{ $fournisseur->nom }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                
                                <td>{{ $commande->prix_total }} dhs</td>
                            </tr>
                   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection