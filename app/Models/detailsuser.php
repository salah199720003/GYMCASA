<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailsuser extends Model
{
    use HasFactory;
    protected $fillable=['useremail','age','sexe','poids','adresse','image'];
}
