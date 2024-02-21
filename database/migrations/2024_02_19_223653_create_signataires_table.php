<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignatairesTable extends Migration
{
    public function up()
    {
        Schema::create('signataires', function (Blueprint $table) {
            $table->id('id_signataire');
            $table->string('nom');
            $table->string('grade');
            $table->string('fonction');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signataires');
    }
}

