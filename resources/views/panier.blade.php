@extends('master')
@section('title', 'Panier - Livraison Fès')

@section('content')
<style>
    :root {
        --primary: #f72525;
        --primary-dark:rgb(197, 4, 4);
        --accent: #f72585;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
        --border-radius: 12px;
        --shadow: 0 4px 20px rgba(0,0,0,0.08);
        --transition: all 0.3s ease;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        padding: 1rem;
        border-radius: var(--border-radius);
        margin-bottom: 1.5rem;
        border: 1px solid #f5c6cb;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
    }

    .cart-page {
        padding: 3rem 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .section-heading {
        margin-bottom: 2rem;
    }

    .section-heading h6 {
        color: var(--accent);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-heading h2 {
        color: var(--dark);
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .cart-item {
        background: white;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .cart-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 24px rgba(0,0,0,0.1);
    }

    .cart-item img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: var(--border-radius);
    }

    .cart-item h5 {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.25rem;
    }

    .cart-item p {
        color: var(--gray);
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    .quantity-control {
        display: flex;
        align-items: center;
    }

    .quantity-btn {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--light-gray);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
    }

    .quantity-btn:hover {
        background: var(--primary);
        color: white;
    }

    .quantity-value {
        min-width: 40px;
        text-align: center;
        font-weight: 600;
    }

    .price {
        font-weight: 600;
        color: var(--primary);
    }

    .delete-btn {
        background: transparent;
        border: none;
        color: var(--gray);
        cursor: pointer;
        transition: var(--transition);
        font-size: 1.1rem;
    }

    .delete-btn:hover {
        color: var(--accent);
    }

    .divider {
        height: 1px;
        background: var(--light-gray);
        margin: 1.5rem 0;
    }

    .summary-card {
        background: white;
        border-radius: var(--border-radius);
        padding: 1.5rem;
        box-shadow: var(--shadow);
        margin-top: 2rem;
    }

    .summary-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .total-row {
        font-weight: 600;
        font-size: 1.1rem;
        border-top: 1px solid var(--light-gray);
        padding-top: 1rem;
        margin-top: 1rem;
    }

    .checkout-btn {
        width: 100%;
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.75rem;
        border-radius: 50px;
        font-weight: 600;
        margin-top: 1.5rem;
        transition: var(--transition);
    }

    .checkout-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .cart-item {
            padding: 1rem;
        }
        
        .cart-item img {
            width: 60px;
            height: 60px;
        }
    }
</style>

<div class="cart-page">
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="section-heading">
            <h6>| Vos plats sélectionnés</h6>
            <h2>Récapitulatif de commande</h2>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                @foreach($commandes as $commande)
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-2 mb-3 mb-md-0">
                                @foreach($produits as $produit)
                                    @if($produit->id == $commande->id_produit)
                                        <img src="{{ asset('storage/'.$produit->image) }}" class="img-fluid rounded">
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                @foreach($produits as $produit)
                                    @if($produit->id == $commande->id_produit)
                                        <h5>{{ $produit->nom }}</h5>
                                        @foreach($fournisseurs as $fournisseur)
                                            @if($fournisseur->id == $produit->fournisseur_id)
                                                <p>{{ $fournisseur->nom }}</p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                <div class="quantity-control d-flex align-items-center">
                                    <a href="{{ route('moinquantite', $commande->id) }}" class="quantity-btn">-</a>
                                    <span class="quantity-value mx-2">{{ $commande->quantite }}</span>
                                    <a href="{{ route('addquantite', $commande->id) }}" class="quantity-btn">+</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 text-md-end mb-3 mb-md-0">
                                <span class="price">{{ $commande->prix_total }} dhs</span>
                            </div>
                            <div class="col-12 col-md-1 text-md-end">
                                <a href="/deleteCommande/{{ $commande->id }}" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">Résumé de la commande</h3>
                    
                    @php
                        $subtotal = 0;
                        foreach($commandes as $commande) {
                            $subtotal += $commande->prix_total;
                        }
                        $delivery = 15.00; // Example delivery fee
                        $total = $subtotal + $delivery;
                    @endphp
                    
                    <div class="summary-row">
                        <span>Sous-total</span>
                        <span>{{ number_format($subtotal, 2) }} dhs</span>
                    </div>
                    <div class="summary-row">
                        <span>Frais de livraison</span>
                        <span>{{ number_format($delivery, 2) }} dhs</span>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div class="summary-row total-row">
                        <span>Total</span>
                        <span>{{ number_format($total, 2) }} dhs</span>
                    </div>
                    
                    <a href="/" class="checkout-btn">
                        Passer la commande
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection