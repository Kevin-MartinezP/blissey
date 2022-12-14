<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompletoYenviarClinicaSolicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitud_examens', function (Blueprint $table) {
            $table->boolean('completo')->default(true);
            $table->boolean('enviarClinica')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitud_examens', function (Blueprint $table) {
            $table->dropColumn('completo');
            $table->dropColumn('enviarClinica');
        });
    }
}
