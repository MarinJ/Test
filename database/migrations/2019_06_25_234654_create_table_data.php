<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre');
            $table->string('Descripcion')->nullable();
            $table->double('Precio', 8, 2)->default(0);
            $table->string('Unidad_medida')->nullable();
            $table->string('Marca')->nullable();
            $table->integer('activo')->default(1);
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
        Schema::dropIfExists('catalogo');    
    }
}
