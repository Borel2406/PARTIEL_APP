<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'DateAchat',
        'ParcoursDefaut',
        'Matricule',
        'Marque',
        'Couleur',
        'Statut',
        'Chauffeur_id', //(Plan A chauffeur) (Plan B id chauffeur dans le model voiture au cas ou retour au plan A)
    ];
     
    // Plan B au cas ou retour au plan A
    public function chauffeur(){
        return $this->belongsTo(Chauffeur::class);
    }
}
