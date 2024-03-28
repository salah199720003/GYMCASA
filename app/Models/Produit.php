<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produit';
    protected $fillable = ['libelle', 'prix', 'discount', 'id_categorie', 'date_creation', 'description', 'image'];

    // Définissez les relations ici
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class, 'id_produit');
    }

    // Relation avec le panier
    public function panier()
    {
        return $this->hasMany(Panier::class, 'produit_id');
    }
}
