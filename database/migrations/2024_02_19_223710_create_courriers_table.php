<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersTable extends Migration
{
    public function up()
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->id('id_courrier');
            $table->string('type_courrier');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courriers');
    }
}
