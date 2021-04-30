@component('mail::message')
#Du nouveau sur openshop
## Un nouveau super produit vient d'etre ajouter sur votre superbe plateform OpenShop

Vous trouverez ci-dessous les informations sur le nouveau produit.
###Designation:{{ $produit->designation }}
### Prix:{{ $produit->prix }}
### Categorie:{{ $produit->categorie->libele}}

 <br>
Pour commander ce produit clicker just le button ci-dessous

@component('mail::button', ['url' => Route('produits.show',$produit)])
Commandez ce produit
@endcomponent

Mersi d'avoir choisi OpenShop pour votre shopping,<br><br>
{{ config('app.name') }}
@endcomponent
