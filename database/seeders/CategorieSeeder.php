<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
                 
            'libele'=>'Materiel informatique',
            'description'=>'ceci est du materiel info'
    
           ]);

           Categorie::create([
                 
            'libele'=>'vetements',
            'description'=>'ceci est la description des vetements'
    
           ]);

           Categorie::create([
                 
            'libele'=>'Cosmetiques',
            'description'=>'ceci est la description du cosmetiques'
    
           ]);
            

        //
    }
}
