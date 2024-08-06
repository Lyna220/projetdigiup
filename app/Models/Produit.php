<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;


    protected $fillable = [
        'reference',
        'designation',
        'categorie',
        'fournisseur_id',
        'quantite_stock',
        'prix_achat',
        'prix_vente',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
