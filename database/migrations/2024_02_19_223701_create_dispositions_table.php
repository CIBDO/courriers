<?php

// database/migrations/YYYY_MM_DD_HHmmSS_create_dispositions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionsTable extends Migration
{
    public function up()
    {
        Schema::create('dispositions', function (Blueprint $table) {
            $table->id('id_disposition');
            $table->string('nom_disposition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispositions');
    }
}
