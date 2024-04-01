<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImputations extends Migration
{
    public function up()
    {
        // Create a view for imputation details
        Schema::create('imputations', function (Blueprint $table) {
            $table->id('id_imputation');
            $table->foreignId('id_courrier_reception')->constrained('reception_courriers','id_courrier_reception');
            $table->date('date_imputation');
            $table->foreignId('id_courrier')->constrained('courriers','id_courrier');
            $table->foreignId('id_service')->constrained('services','id_service');
            $table->foreignId('id_personnel')->constrained('personnels','id_personnel');
            $table->foreignId('id_disposition')->constrained('dispositions','id_disposition');
            $table->text('observation')->nullable();
            $table->timestamps();
        });

        // Create a view for imputation history
        Schema::create('imputation_historys', function (Blueprint $table) {
            $table->id('id_imputation_history');
            $table->foreignId('id_courrier_reception')->constrained('reception_courriers','id_courrier_reception');
            $table->date('date_imputation');
            $table->foreignId('id_courrier')->constrained('courriers','id_courrier');
            $table->foreignId('id_service')->constrained('services','id_service');
            $table->foreignId('id_personnel')->constrained('personnels','id_personnel');
            $table->foreignId('id_disposition')->constrained('dispositions','id_disposition');
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imputations');
        Schema::dropIfExists('imputation_historys');
    }
}
