<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionsTable extends Migration
{
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_reception');
            $table->unsignedBigInteger('produit_id');
            $table->integer('quantite');
            $table->date('date_reception');
            $table->unsignedBigInteger('fournisseur_id');
            $table->string('reference'); // Ajout de la colonne reference
            $table->string('responsable'); // Changer responsable_id en responsable
            $table->timestamps();
            
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('receptions');
    }
}
