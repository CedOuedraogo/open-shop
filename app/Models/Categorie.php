<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory; 

    public $fillable=[ 'libele','description'];

    public function produits()
    {
        # code...
        return $this->hasMany(Produit::class);

    }
}
