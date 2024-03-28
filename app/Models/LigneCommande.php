<?php
// app/Models/LigneCommande.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    protected $table = 'ligne_commande';
    protected $fillable = [
        'id_produit',
        'id_commande',
        'prix',
        'quantite',
        'total',
    ];

    // Relation avec le produit
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    // Relaion avec la commande
    

 
}
