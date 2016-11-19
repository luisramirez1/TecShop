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
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Alienware',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Apple',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Apple',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Asus',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Blackberry',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Compaq',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Dell',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Gateway',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Hisense',
                'categoria' => '4'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'HP',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'HTC',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Huawei',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Lenovo',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Lg',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Microsoft',
                'categoria' => '3'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Samsung',
                'categoria' => '1'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => '1'
            ]
        );
        
        DB::table('marcas')->insert([
                'name' => 'Sony',
                'categoria' => '4'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Toshiba',
                'categoria' => '2'
            ]
        );

        DB::table('marcas')->insert([
                'name' => 'Xiaomi',
                'categoria' => '1'
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
