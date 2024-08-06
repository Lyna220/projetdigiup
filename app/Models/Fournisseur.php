<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'societe',
        'responsable',
        'adresse',
        'ville',
        'telephone',
        'mobile',
        'email',
        'ice',
        'observation',
    ];
}
