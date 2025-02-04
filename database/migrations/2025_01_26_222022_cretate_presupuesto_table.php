<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cabecera_presupuesto', function (Blueprint $table){
            $table->increments('id_cabecera')->primary();
            $table->integer('num_cab')->unique();
            $table->date('fec_cab');
            $table->string('rif_cab');
            $table->string('nom_cab');
            $table->string('dir_cab');
            $table->string('tel_cab');
            $table->string('mal_cab');
            $table->timestamps();
            
        });
        Schema::create("detalle_presupuesto", function(Blueprint $table){
            $table->increments('id_detalle')->primary();
            $table->integer('id_cabecera')->unsigned();
            $table->integer('id_pro');
            $table->integer('can_det');
            $table->decimal('pre_det', 5, 2);
            $table->decimal('tot_det', 5, 2);
            $table->timestamps();
            $table->foreign('id_cabecera')->references('id_cabecera')->on('cabecera_presupuesto')->onDelete('no action'); 

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cabecera_presupuesto");
        Schema::dropIfExists("detalle_presupuesto");
    }
};
