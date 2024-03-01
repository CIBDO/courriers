<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id('id_personnel');
            $table->string('nom_personnel');
            $table->string('prenom_personnel');
            $table->string('Matricule');
            $table->string('grade');
            $table->string('corps');
            $table->foreignId('id_service')->constrained('services','id_service');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
