<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   /* public function run()   *pour renseigner nos données
    {
        $produit= Produit::create([
            'designation'=>'chemise',
            'prix'=>5000,
            'description'=>'ceci est la description de chemise',
            'quantite'=>50,

        ]);
    }*/

    

    public function run()
    {
        Produit::Factory(50)->create(); //du fait kon peut pas executer le factory direct dans le T on lamene dans le Seed our execute

        
    }
}
