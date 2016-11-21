<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('categorias')->insert([
                'name' => 'Celulares'
            ]
        );

        DB::table('categorias')->insert([
                'name' => 'Computadoras'
            ]
        );

        DB::table('categorias')->insert([
                'name' => 'Consolas'
            ]
        );

        DB::table('categorias')->insert([
                'name' => 'Electronica'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
