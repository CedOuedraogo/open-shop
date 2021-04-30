<x-master-layout>

<div class="container">
    <div class="row">
        {{-- Alerte --}}
        @if (session('statut'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('statut') }}</strong> 
                    </div>
                </div>
         @endif 

           
     
        <div class="col-md-12">

                    <h1 class="text-center mt-2">Tous nos produits</h1>
                       <h5 class="text-center">Notre catalogue comporte {{ nb_produit(2) }}</h5>

                @if (Auth::user()!=null && Auth::user()->isAdmin())   <!--pour empecher les users de puovoir acceder sina etre admin-->

                            <div class="ml-2">
                                <a class="btn btn-primary btn sm" href="{{route('produits.create') }}"><i class="fas fa-plus"></i>Ajouter</a>
                            </div>  
                @endif
        </div>

           
    </div>
    

    <div class="row">
        <div class="col-md-12">
           <table class="table">
               
               <thead>
                   <tr>
                       <th class="text-center">designation</th>
                       <th class="text-center">prix</th>
                       <th class="text-center">quantite</th>
                       <th class="text-center">description</th>
                       <th class="text-center">action</th>

                   </tr>
               </thead>
               <tbody>
                   
                   @foreach ( $produits as $produit )

                   <tr>
          
                          <td scope="row">{{ $produit->designation}}</td>
                          <td>{{format_prix($produit->prix)}}</td>
                          <td>{{ $produit->quantite}}</td>
                          <td>{{ $produit->description}}</td>
                          <td class="d-flex">
                              <a class="btn btn-info btn-sm mr-2" href="{{route('produits.show',$produit)}}"> <i class="fas fa-eye"></i></a>

                                    @if (Auth::user()!=null && Auth::user()->isAdmin())

                                            <a class="btn btn-primary btn-sm mr-2" href="{{route('produits.edit',$produit)}}"> <i class="fas fa-edit"></i></a>
                                        

                                            <a onclick="event.preventDefault(); if(confirm('etes vous sur de vouloir supprimer ce produit?
                                            ')) document.getElementById('{{$produit->id}}').submit()" class="btn btn-danger btn-sm" href="{{route('produits.destroy',$produit)}}"><i class="fas fa-trash"></i></a> <!-- pour recuperer lelemen et sup -->

                                            <form id="{{$produit->id}}" method="POST" action="{{route('produits.destroy',$produit)}}">
                                                @csrf
                                                @method("DELETE")
                                            </form>

                                    @endif

                         </td>
                          
                      </tr>
                    
                @endforeach   
                  
               </tbody>
           </table>
           <div class="row d-flex justify-content-center mt-5">
               <div class="">
                   {{ $produits->links() }} <!-- pour ajouter la pgination en bas de la table -->
               </div>
           </div>
        </div>
    </div>
</div>


</x-master-layout>
