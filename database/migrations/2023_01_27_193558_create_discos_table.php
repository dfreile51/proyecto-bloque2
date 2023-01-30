<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30)->unique();
            $table->string('artista', 30);
            $table->string('formato', 30);
            $table->string('pais', 30);
            $table->date('fecha');
            $table->string('genero', 30);
            $table->integer('precio')->unsigned();
            $table->string('imagen', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discos');
    }
};
