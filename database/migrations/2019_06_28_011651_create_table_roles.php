<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Roles;

class CreateTableRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nombre'); 
            $table->integer('activo');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rol_id');
        });
            $cat = new Roles; 
            $cat->Nombre = 'Super Admin'; 
            $cat->activo = 1;  
            $cat->save();
            $cat = new Roles; 
            $cat->Nombre = 'Back Office Assistant'; 
            $cat->activo = 1;  
            $cat->save();
            $cat = new Roles; 
            $cat->Nombre = 'Customer'; 
            $cat->activo = 1;  
            $cat->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('roles');
         Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('rol_id');
    }); 
    }
}
