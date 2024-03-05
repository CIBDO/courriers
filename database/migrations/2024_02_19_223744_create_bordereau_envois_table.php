<?php

// database/migrations/YYYY_MM_DD_HHmmSS_create_bordereau_envois_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBordereauEnvoisTable extends Migration
{
    public function up()
    {
        Schema::create('bordereau_envois', function (Blueprint $table) {
            $table->id('id_bordereau');
            $table->string('reference_bordereau');
            $table->date('date_bordereau');
            $table->enum('priorite', ['Simple', 'Urgente', 'Autre']);
            $table->enum('confidentialite', ['Oui', 'Non']);
            $table->foreignId('id_courrier')->constrained('courriers','id_courrier');
            $table->string('designation');
            $table->string('destinateur');
            $table->foreignId('id_disposition')->constrained('dispositions','id_disposition');
            $table->foreignId('id_signataire')->constrained('signataires','id_signataire');
            $table->integer('nbre_piece');
            $table->enum('statut', ['Envoyé','Rejeté']);
            $table->string('charger_courrier');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bordereau_envois');
    }
}
