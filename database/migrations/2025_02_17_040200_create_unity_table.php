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
        Schema::create('unitys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flags_id')->nullable();
            $table->foreign('flags_id')->references('id')->on('flags')->onDelete('cascade');
            $table->string('fantasy-name', 128);
            $table->string('corporate-name', 128);
            $table->string('cnpj', 18);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unitys');
    }
};
