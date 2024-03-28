<?php

// app/Models/Commande.php

// app/Models/Commande.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commande';
    protected $fillable = ['id_client', 'total', 'valide', 'date_creation'];

    // Relation avec l'utilisateur
    public function client()
    {
        // Assurez-vous d'importer la classe User
        return $this->belongsTo(User::class, 'id_client');
    }

    // Relation avec les lignes de commande
    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class, 'id_commande');
    }
}
