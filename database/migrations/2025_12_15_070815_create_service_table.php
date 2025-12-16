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
        Schema::create('Service', function (Blueprint $table) {
    $table->string('ServiceNo', 20)->nullable();
    $table->string('Line_No', 50)->nullable();
    $table->string('SerialNo', 50)->nullable();
    $table->string('ItemNo', 20)->nullable();
    $table->string('Description', 250)->nullable();
    $table->string('UomCode', 10)->nullable();
    $table->string('ServiceType', 20)->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Service');
    }
};
