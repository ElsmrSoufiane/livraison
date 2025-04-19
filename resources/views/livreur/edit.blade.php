
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

<div class="container">
    <h1>Modifier le livreur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livreur.update', $livreur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom_complet" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="nom_complet" name="nom" 
                   value="{{$livreur->nom}}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
            value="{{$livreur->email}}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" value="{{$livreur->mot_de_passe}}" name="mot_de_passe">
            <small class="text-muted">Laisser vide pour conserver le mot de passe actuel</small>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="address" 
            value="{{$livreur->address}}" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="numero" 
            value="{{$livreur->numero}}" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Modifier">


        <a href="{{ route('livreurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection