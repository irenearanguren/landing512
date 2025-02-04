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
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id_cat')->primary();
            $table->string('nom_cat', 20)->unique();
            $table->string('tip_cat', 30);
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id_pro')->primary();
            $table->string('cod_pro', 20)->unique();
            $table->string('nom_cod', 40);
            $table->string('est_pro', 15);
            $table->decimal('pre_pro', 5, 2);
            $table->string('img_pro', 200);
            $table->decimal('pes_pro', 5, 2);
            $table->timestamps();
        });

        Schema::create('productos_por_categorias', function (Blueprint $table) {
            $table->increments('id_pro_cat')->primary();
            $table->integer("id_pro")->unsigned();
            $table->integer("id_cat")->unsigned();
            $table->timestamps();
            $table->foreign("id_pro")->references("id_pro")->on("productos");
            $table->foreign("id_cat")->references("id_cat")->on("categorias");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('productos_por_categorias');
    }
};
