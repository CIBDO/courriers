<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courrier_internes', function (Blueprint $table) {
            $table->id('id_courrierinterne');
            $table->string('reference');
            $table->date('date_creation');
            $table->text('objet');
            $table->foreignId('id_expeditaire')->constrained('expeditaires','id_expeditaire');
            $table->foreignId('id_courrier')->constrained('courriers','id_courrier');
            $table->foreignId('id_destinataire')->constrained('destinataires','id_destinataire');
            $table->foreignId('id_personnel')->constrained('personnels','id_personnel');
            $table->foreignId('id_disposition')->constrained('dispositions','id_disposition');
            $table->integer('nbre_piece');
            $table->enum('statut', ['Envoyé','Rejeté','Traité']);
            $table->string('charger_courrier');
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrier_internes');
    }
};
