<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('categoria');
            $table->rememberToken();
            $table->timestamps();
        });


//..................................................................... 
        DB::table('marcas')->insert([
                'name' => 'Acer',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Alienware',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Apple',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Apple',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Asus',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Blackberry',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Compaq',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Dell',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Gateway',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Hisense',
                'categoria' => 'electronica'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'HP',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'HTC',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Huawei',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Lenovo',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Lg',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Microsoft',
                'categoria' => 'Consolas'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Samsung',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => 'celulares'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => 'electronica'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Toshiba',
                'categoria' => 'computadoras'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Xiaomi',
                'categoria' => 'celulares'
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
        Schema::drop('marcas');
    }
}
