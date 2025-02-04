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
        Schema::create('cambios_precio_dolar', function (Blueprint $table) {
            $table -> increments('id_cambio') ->primary();
            $table -> decimal('precio_dolar', 5, 2);
            $table -> date('fecha');
        });
    }

    
    /**
     * Reverse the migrations.
     * @retutn void
     */
    public function down(): void
    {
        
        Schema::dropIfExists('cambio_precio_dolar');
    }
};

