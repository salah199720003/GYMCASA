<?php
// Dans le modèle Panier.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = ['user_id', 'produit_id', 'quantite'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    // Ajoutez d'autres méthodes ou relations nécessaires
}

