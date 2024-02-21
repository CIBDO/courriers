<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id('id_profil');
            $table->string('nom_profil');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profils');
    }
}
