<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use App\Mail\AjoutProduit;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NouveauProduit;
use App\Http\Requests\ProduitFormRequest;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct () {

        $this->middleware(['auth','isAdmin'])->except(['index','show']);  //aplication du middleware


     }
 
     
    public function index()
    {
        // $produits= Produit::all(); permet de tous recuperer
        $produits = Produit::paginate(15); //permet de recuper par lot de 15

        return view('front-office.produit.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();

           


        //dd($categories);

        $produit = new Produit();

        return view('front-office.produit.create', ['categories' => $categories, 'produit' => $produit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)// nous permet de recuper les objets de mon champ
    {
        // dd($request->all());
        $imageName="produit.png";
        if($request->file('image')){

           $imageName= time().'_'.$request->file('image')->getClientOriginalName();
           $request->file('image')->storeAs("public/produits", $imageName); //cette fonction storeAs di de partir dan le dossier app puis dans public pui de creer dossier produit puis 
        }


        $produit = new Produit();

        $produit->designation = $request->designation;
        $produit->prix = $request->prix;
        $produit->description = $request->description;
        $produit->quantite = $request->quantite;
        $produit->categorie_id = $request->categorie_id;
        $produit->image = $imageName;

        $produit->save();

        $user = User::first();
        Mail::to($user)->send(new AjoutProduit($produit));  //pour envoyer les mail
        //$produit = Produit::orderByDesc('id')->first();
     
        //$user->notify(new NouveauProduit($produit)); //pour les notif

        return redirect()->route('produits.show', $produit)->with('statut', 'votre produit a bien ete enregistrer');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('front-office.produit.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();

        return view('front-office.produit.edit',
        ['produit' => $produit, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        Produit::where('id', $id)->update([
            'designation' => $request->designation,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'image' => $request->image,

        ]);
        $user = User::first();
       $produit = Produit::orderByDesc('id')->first();
     
        $user->notify(new NouveauProduit($produit)); //pour les notif

        return redirect()->route('produits.show', $id)->with('statut', 'votre produit a bien ete modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);

        return redirect()->route('produits.index')->with('statut', 'votre produit a bien été supprimer');
    }
}
