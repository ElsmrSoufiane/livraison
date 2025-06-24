
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo -->
                    <a  class="logo" >
                        <h1 >RapidoClick</h1>
                    </a>
                    <!-- Menu -->
                    <ul class="nav">
                    <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Principale</a></li>
<li><a href="/places" class="{{ Request::is('places') ? 'active' : '' }}">Places</a></li>
<li> <div></div> </li>
@guest()
<li><a href="/connecter" class="{{ Request::is('connecter') ? 'active' : '' }}">Connecter</a></li>
<li><a href="/inscrire" class="{{ Request::is('inscrire') ? 'active' : '' }}"><i class="fa fa-user"></i> Inscrire</a></li>
@endguest
@auth()
@if(auth()->user()->role == 'admin')
<li><a href="/admin" class="{{ Request::is('admin') ? 'active' : '' }}"><i class="fa fa-user"></i> coté admin</a></li>
<li><a href="/logout" class=""><i class="fa fa-user"></i>déconnecter</a></li>
@endif
@if(auth()->user()->role == 'livreur')
<li><a href="/livreur" class="{{ Request::is('livreur') ? 'active' : '' }}"><i class="fa fa-motorcycle"></i> coté livreur</a></li>
<li><a href="/logout" class=""><i class="fa fa-user"></i>déconnecter</a></li>
@endif
@if(auth()->user()->role == 'compte')
<li><a href="/panier" class="{{ Request::is('panier') ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i>
panier <span class="btn btn-danger"> {{$nbrecommandes}} </span></a></li>

<li><a href="/logout" class=""><i class="fa fa-user"></i>déconnecter</a></li>
<li></li>
@endif

@endauth

                  </ul>   <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                  
                </nav>
            </div>
        </div>
    </div>
  </header>