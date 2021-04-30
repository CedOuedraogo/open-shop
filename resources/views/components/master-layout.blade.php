<!doctype html>
<html lang="fr">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!--appel du fichier css avec asset -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" /> <!--lien pour utiliser les icon/// font awesome 5 cdn -->

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="{{route('accueil')}}">OpenShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('accueil')}}">Accueil<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('produits.index')}}">Nos produits</a>
            </li> <li class="nav-item">
              <a class="nav-link" href="#">Categorie</a>
            </li>
          </li> <li class="nav-item">
            <a class="nav-link" href="#">Description</a>
          </li>

          </ul>

          <ul class="navbar-nav mt-2 mt-lg-0">

            @guest
              
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('register') }}">Inscription</a>
            </li> <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            </li>

            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a  onclick="event.preventDefault(); document.getElementById('deconnexion').submit();" class="dropdown-item" href="{{ route('logout') }}">Deconnexion</a> <!-- puis on utilise onclick pour valider le click sur le btn -->

                <form id="deconnexion"  method="Post"  action="{{ route('logout') }}"> <!-- on utilise un formulaire pask la balise a nutilise kune methode de type GET, mais ce cas on veut executer une methode de type POST -->
                   @csrf
                </form>
                
              </div>
            </li>
    


            @endguest
           
          
          
          </ul>

     
        </div>
      </nav>

        <main class="main-app mb-5">
          {{$slot}}
        </main>

        <br>
        <footer>

<div class="container-fluid bg-dark pt-4 pb-4" >
  <div class="text-center text-white">
      &copy; OpenShop 2021 | Tous droits reservés.
  </div>

</div>
        </footer>
          
      

          </div>
        </footer>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script> <!--js de font awsome -->
  </body>
</html><!--     <form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>   -->