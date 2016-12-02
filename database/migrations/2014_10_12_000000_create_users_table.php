<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('tipoUsuario');
            $table->bigInteger('tel');
            $table->string('imagen')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('verifiedLogin')->default(false);
            $table->integer('compras')->default(0);
            $table->string('token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
                'name' => 'Luis Fernando Ramirez Salazar',
                'email' => 'luisramirez.lfrs@gmail.com',
                'password' => bcrypt('luis123'),
                'tipoUsuario' => '1',
                'verified' => '1',
                'tel' => '6672005057'
            ]
        );

        DB::table('users')->insert([
                'name' => 'Jose Mario Sanz Lopez',
                'email' => 'josemario.sanz@gmail.com',
                'password' => bcrypt('sanz123'),
                'tipoUsuario' => '1',
                'verified' => '1',
                'tel' => '6674734974'
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
        Schema::dropIfExists('users');
    }
}
