<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comprobante', 20);
            $table->string('serie_comprobante', 7);
            $table->string('num_comprobante', 10);
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 4, 2);
            $table->decimal('total', 11, 2);

            $table->unsignedBigInteger('idproveedor');
            $table->foreign('idproveedor')->references('id')->on('proveedors')->onDelete('cascade');

            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('compras');
    }
}
