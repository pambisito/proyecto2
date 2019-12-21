<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo__users', function (Blueprint $table) {
            $table->integer('codArticulo');
            $table->integer('codCliente');
            $table->unique(['codArticulo', 'codCliente']);
            $table->foreign('codArticulo')->references('codArticulo')->on('articulos')->onDelete('cascade');
            $table->foreign('codCliente')->references('codCliente')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('articulo__users');
    }
}
