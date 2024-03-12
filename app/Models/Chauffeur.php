<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'Prenom',
        'Experience',
        'Num_permis',
        'Emission',
        'Expiration',
        'Categorie',    
    ];
     // Plan B au cas ou retour au plan A
    public function voiture()
    {
        return $this->hasMany(Voiture::class);
    }
}
