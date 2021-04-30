<x-master-layout>
<div class="container">
<div class="row">
    
    <div class="col-md-12">
        <h1 class="text-center">
              Ajout d'un nouveau produit
              <hr>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="{{route('produits.store')}}" enctype="multipart/form-data" method="post"> <!--pour appeler laction de la route enctype permet de selectionner les data -->  
            @csrf
            @method("POST")
                 <!-- form-submit pour generer le boutton-->
                 
                 @include("partials._produit-form")
        </form>
    </div>
</div>

</div>
</x-master-layout>