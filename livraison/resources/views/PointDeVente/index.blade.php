@extends("master")
@section("title")
gestions des points de vente
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



<div class="main-content">
@include('adminnav')


    <div class="card">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pointdeventes as $pointdevente)
                    <tr>
                        <td>{{ $pointdevente->nom }}</td>
                        <td>{{ $pointdevente->localisation }}</td>
                        @foreach($categories as $categorie)
                            @if($pointdevente->id_categorie == $categorie->id)
                                <td>{{ $categorie->categorie }}</td>
                            @endif 
                            @endforeach
                        
                            <td>
                            <a href="/admin/pointdevente/edit/{{ $pointdevente->id }}" class="btn btn-primary">Modifier</a>
                            <a href="/admin/pointdevente/delete/{{ $pointdevente->id }}" class="btn btn-primary">suprimmer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <a href="/admin" class="btn">
                + Ajouter un point de vente
            </a>
        </div>
    </div>
</div>


@endsection
