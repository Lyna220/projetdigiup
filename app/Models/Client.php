<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'genre',
        'cine',
        'adresse',
        'premiere_visite',
        'derniere_visite',
        'client_depuis',
        'total_vente',
        'total_reglement',
        'reste_du',
        'nombre_visite',
        'assurance',
    ];
}
