<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{

    public $fillable=[ 'designation, prix, description, quantite','categorie_id','image'];

    use HasFactory; 
    public function categorie()
    {
      return $this->belongsTo(Categorie::class);
    }

    public function users()
    {
        # code...

        return $this->belongsToMany(User::class);
    }
}
