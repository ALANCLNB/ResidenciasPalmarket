<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->char('id_user',5);
        $table->string('descripcion');
        $table->string('token');
        $table->string('imagen');
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
    Schema::dropIfExists('categorias');
}
}
