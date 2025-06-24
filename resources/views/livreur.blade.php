@extends("master")
@section("title")
les meilleurs restaurants et patisseries de fes
@endsection

@section("content")
<style>
         :root {
              --primary:rgb(247, 121, 37);
              --secondary:rgb(247, 121, 37);
        --primary-dark:rgb(197, 4, 4);
        --accent:rgb(247, 125, 37);
        --light: #f8f9fa;
            --background: #f0f0f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: var(--background);
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Style */
        .sidebar {
            width: 280px;
            background: var(--primary);
            padding: 25px;
            color: white;
        }

        .logo {
            font-size: 24px;
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
        }

        .nav-item:hover {
            background: var(--secondary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
        }

        /* Commande Livreur Style */
        .commande-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .commande-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .commande-id {
            color: var(--secondary);
            font-weight: bold;
        }

        .commande-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .detail-item strong {
            color: var(--primary);
            display: block;
            margin-bottom: 5px;
        }

        .status-badge {
            background: var(--accent);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 20px;
            }

            .commande-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .commande-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
    <div class="admin-container">
      

        <div class="main-content">
            <!-- Carte Commande -->
             @foreach ($commandes as $commande)
            <div class="commande-card">
                <div class="commande-header">
                    <div class="commande-id">{{$commande->created_at}}</div>
                   
                </div>
                
                <div class="commande-details">
                    <div class="detail-item">
                      
                        <strong>Client:</strong>
                        <span>{{$commande->client->nom}}</span>
                        
                    </div>
                    
                    <div class="detail-item">
                        <strong>Adresse:</strong>
                        <span>{{$commande->address}}</span>
                    </div>
                    
                    <div class="detail-item">
                        <strong>Téléphone:</strong>
                        <span>{{$commande->numero}}</span>
                    </div>
                </div>

                    <div style="margin-top: 20px;">
           
                    <h3 style="color: var(--primary); margin-bottom: 15px;">{{$commande->produit->nom}}</h3>
                    <div class="produit-item" style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee;">
                        
                       
                        <span>Quantité: {{$commande->quantite}} </span>
                    </div>
                </div>
                

               <a href="/demarer/{{auth()->user()->id}}/{{$commande->id}}"> <button class="btn" style="background: var(--secondary); color: white; margin-top: 20px; width: 100%; padding: 12px;">
                    Démarrer la livraison
                </button>
    </a>
            </div>
@endforeach
@foreach ($commandeslivreur as $commande)
            <!-- Autres Commandes -->
            <div class="commande-card">
                <div class="commande-header">
                    <div class="status-badge">En cours</div>
                    <div class="commande-id">{{$commande->created_at}}</div>
                   
                </div>
                
                <div class="commande-details">
                    <div class="detail-item">
                      
                        <strong>Client:</strong>
                        <span>{{$commande->client->nom}}</span>
                        
                    </div>
                    
                    <div class="detail-item">
                        <strong>Adresse:</strong>
                        <span>{{$commande->address}}</span>
                    </div>
                    
                    <div class="detail-item">
                        <strong>Téléphone:</strong>
                        <span>{{$commande->numero}}</span>
                    </div>
                </div>

                <div style="margin-top: 20px;">
           
                    <h3 style="color: var(--primary); margin-bottom: 15px;">{{$commande->produit->nom}}</h3>
                    <div class="produit-item" style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee;">
                        
                       
                        <span>Quantité: {{$commande->quantite}} </span>
                    </div>
                </div>
                <div class="progress-bar" style="margin-top: 20px; background: #eee; border-radius: 10px; height: 10px;">
                    <div style="width: 60%; background: var(--secondary); height: 100%; border-radius: 10px;"></div>
                </div>
                <a href="/terminer/{{$commande->id}}"> <button class="btn" style="background: var(--secondary); color: white; margin-top: 20px; width: 100%; padding: 12px;">
                   terminer la livraison
                </button>
    </a>
            </div>
           
            @endforeach

            @foreach ($commandestermines as $commande)
            <!-- Autres Commandes -->
            <div class="commande-card">
                <div class="commande-header">
                    <div class="status-badge">terminé</div>
                    <div class="commande-id">{{$commande->created_at}}</div>
                   
                </div>
                
                <div class="commande-details">
                    <div class="detail-item">

                        <strong>Client:</strong>
                        <span>{{$commande->client->nom}}</span>
                      
                    </div>
                    
                    <div class="detail-item">
                        <strong>Adresse:</strong>
                        <span>{{$commande->address}}</span>
                    </div>
                    
                    <div class="detail-item">
                        <strong>Téléphone:</strong>
                        <span>{{$commande->numero}}</span>
                    </div>
                </div>

                    <div style="margin-top: 20px;">
           
                    <h3 style="color: var(--primary); margin-bottom: 15px;">{{$commande->produit->nom}}</h3>
                    <div class="produit-item" style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee;">
                        
                       
                        <span>Quantité: {{$commande->quantite}} </span>
                    </div>
                </div>
      
            </div>
           
            @endforeach
        </div>


        
        
    </div>
@endsection
