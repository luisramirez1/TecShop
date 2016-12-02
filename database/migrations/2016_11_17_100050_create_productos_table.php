<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descripcion');
            $table->string('descripcion2')->nullable();
            $table->string('imagen');
            $table->string('imagen2');
            $table->integer('precio');
            $table->integer('categoria');
            $table->integer('marca');
            $table->integer('calificacion')->default(0);
            $table->integer('existencia')->nullable();
            $table->rememberToken();
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
        Schema::drop('productos');
    }
}
