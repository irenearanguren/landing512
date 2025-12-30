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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('desc', 500)->nullable();
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 100);
            $table->text('desc', 500)->nullable();
            $table->decimal('pric', 10, 2);
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->string('stat', 30)->default('disponible');
            $table->timestamps();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('no action');
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('type', 50);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->string('ruta', 100);
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');
        });

    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('imagenes');
    }
};
