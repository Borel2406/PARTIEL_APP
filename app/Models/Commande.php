<?php

namespace App\Models;

use App\Models\Commande;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'Sujet',
        'LieuDepart',
        'Destination',
        'Date',
    ];
}
