<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarritoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritoproductos', function (Blueprint $table) {
            $table->id();
            $table->string('id_producto');
            $table->string('id_user');
            $table->string('id_pedido');
            $table->string('cantidad');
            $table->string('unidad');
            $table->string('imagen');
            $table->string('status');
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
        Schema::dropIfExists('carritoproductos');
    }
}
