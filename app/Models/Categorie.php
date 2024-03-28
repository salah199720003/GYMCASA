<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie'; 
    protected $fillable = ['libelle', 'description', 'icone']; 
    protected $dates = ['date_creation'];
    public function produits()
    {
        return $this->hasMany(Produit::class, 'id_categorie', 'id');
    }
}
