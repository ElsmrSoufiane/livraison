<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a href="index.html" class="logo">
                        <h1>Livraison</h1>
                    </a>
                    <!-- Menu -->
                    <ul class="nav">
                    <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Principale</a></li>
<li><a href="/places" class="{{ Request::is('places') ? 'active' : '' }}">Places</a></li>
<li><a href="/commandepersonelle" class="{{ Request::is('commandepersonelle') ? 'active' : '' }}">+Commandes personnalisées</a></li>
<li><a href="/connecter" class="{{ Request::is('connecter') ? 'active' : '' }}">Connecter</a></li>
<li><a href="/inscrire" class="{{ Request::is('inscrire') ? 'active' : '' }}"><i class="fa fa-user"></i> Inscrire</a></li>

                  </ul>   <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                  
                </nav>
            </div>
        </div>
    </div>
  </header>