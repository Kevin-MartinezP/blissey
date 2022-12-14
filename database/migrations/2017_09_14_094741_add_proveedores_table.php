<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('proveedors', function (Blueprint $table) {
        $table->string('correo',30);
        $table->string('telefono',9);
        $table->boolean('estado')->default(true);
        /*
        Estado-------------------
        true: Activo
        false: Inactivo
        -------------------------
        */
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('proveedors', function (Blueprint $table) {
          //
      });
    }
}
