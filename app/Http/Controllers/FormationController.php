<?php

namespace App\Http\Controllers;

use App\Models\User;
/*use App\Http\Controller\FormationController;*/
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FormationController extends Controller
{


    public function index()
    {
        # code...
       // abort(503); permet d'interrompre l'execution des services quand lutilisateur clik
        $produit1=Produit::first(); //test pour recuperer 
        $user1= User::first();
        $user1->produits()->attach($produit1);
        
        dd($user1->produits);
        dd($categorie1->produits);
        $categorie1= Categorie::first();
        $produit1->categorie_id = $categorie1->id;
        
        $produit1->save();
        // $produit=Produit::first();
       // $produit2=Produit::where('id',2)->first();
        //$produit2=Produit::where('prix',500000)->get();
       // $produit2=Produit::where('prix','<',500000)->get(); //prix inferieur a 500000
       
        dd($produit1->categorie);
    }
    
    public function ajouterProduit()  
    {
       $produits= new Produit();

       $produit->designation='ordinateur';
       $produit->prix=500000;
       $produit->description='trop bon';
       $produit->quantite=20;
       $produit->save();
       //*dd($produit); just pour afficher le tableau dans la vue
    }  


public function updateProduit()
{
   $produit1=Produit::first();
   $produit1->designation='Avovita';
   $produit1->prix=1800;
   $produit1->description="Pommade feminine a base d'avocat";
   $produit1->quantite=10;
   $produit1->save();

   dd($produit1);
}

/*public function updateProduit2($id)   /same.1
{
    $produit2=Produit::findOrFail($id);  //recupere le produit dont l'id est 2, findOrFai permet de cacher les ereur a lutilisateur
    $produit2=Produit::find(int $id) //oblige le user a mettre ds entier
    dd($produit2->designation);

} */


public function updateProduit2(Produit $produit) //same.1
{
    
   // dd($produit->designation);


   $result = Produit::where('id',$produit->id)->update([  /*return un booleen */
      'designation'=>'Telephone',
      'prix'=>50000,
      'description'=>"ceci est le description de telephone",
      'quantite'=>26


    ]);
          dd($produit->designation, $result);
  
}

  public function suppressionProduit() //pour supprimer
  {
      # code...

      $result=Produit::destroy(1);
     dd($result);

  }
 

}
