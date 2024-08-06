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
        Schema::create('stuffs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->double('price')->default(0);
            $table->string('unit')->nullable();
            $table->longText('image')->nullable();
            $table->integer('status')->default(0);
            $table->string('id_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuffs');
    }
};
