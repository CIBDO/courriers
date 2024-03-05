<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionCourriersTable extends Migration
{
    public function up()
    {
        Schema::create('reception_courriers', function (Blueprint $table) {
            $table->id('id_courrier_reception');
            $table->string('reference');
            $table->enum('priorite', ['Simple', 'Urgente', 'Autre']);
            $table->enum('confidentialite', ['Oui', 'Non']);
            $table->date('date_courrier');
            $table->date('date_arrivee');
            $table->string('expeditaire');
            $table->foreignId('id_courrier')->constrained('courriers','id_courrier');
            $table->foreignId('id_service')->constrained('services','id_service');
            $table->foreignId('id_personnel')->constrained('personnels','id_personnel');
            $table->text('objet_courrier');
            $table->integer('nbre_piece');
            $table->string('charger_courrier');
            $table->enum('statut', ['Traité', 'Reçu','en cours de traitement','Rejeté']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reception_courriers');
    }
}