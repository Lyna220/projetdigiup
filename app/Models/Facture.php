<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_facture',
        'date_facture',
        'client_id',
        'status',
        'total',
        'remise',
        'avance',
        'reste_a_payer',
        'responsable', 
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
