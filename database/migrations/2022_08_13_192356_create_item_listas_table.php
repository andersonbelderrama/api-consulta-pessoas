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
        Schema::create('item_listas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('documento');
            $table->string('motivo');
            $table->timestamps();

            $table->unsignedBigInteger('lista_id');
            $table->foreign('lista_id')->references('id')->on('listas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_listas');

    }
};
