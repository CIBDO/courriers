<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImputationsTable extends Migration
{
    public function up()
    {
        Schema::create('imputations', function (Blueprint $table) {
            $table->id('id_imputation');
            $table->foreignId('id_courrier_reception')->constrained('reception_courriers','id_courrier_reception');
            $table->date('date_imputation');
            $table->string('origine');
            $table->text('objet');
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
    }
}

