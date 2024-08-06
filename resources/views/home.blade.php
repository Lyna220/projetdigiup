<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil - DIGIOPTIC</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        header {
            background-color: #3498db;
            padding: 10px 0;
        }
        .navbar-brand, .nav-link {
            color: #fff;
        }
        .nav-link:hover {
            color: #dfe6e9;
        }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 1.2em;
        }
        .card a:hover {
            text-decoration: none;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .loader {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .loader div {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 50px;
            height: 50px;
            animation: spin 0.5s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head> 
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="/">DIGIOPTIC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                           
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1 class="text-center my-4">Bienvenue <strong style="text-transform: uppercase;">{{ Auth::user()->name }}</strong>  </h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('fournisseurs.index') }}">Fournisseurs</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('produits.index') }}">Produits</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('clients.index') }}">Clients</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('stocks.index') }}">Stocks</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('ventes.index') }}">Ventes</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('receptions.index') }}">Achats</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('factures.index') }}">Factures</a>
                </div>
            </div>
        
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ route('caisses.index') }}">Caisses</a>
                </div>
            </div>

        </div>
    </div>

    <div class="loader" id="loader">
        <div></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.redirect-link').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const url = this.href;
                const loader = document.getElementById('loader');
                loader.style.display = 'flex';

                setTimeout(() => {
                    window.location.href = url;
                }, 200);
            });
        });

        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
</body>
</html>
