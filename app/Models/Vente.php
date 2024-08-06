<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
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
protected $casts = [
    'date_facture' => 'datetime:Y-m-d',
];
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
 
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
