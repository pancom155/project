<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveryInfo', function (Blueprint $table) {
            $table->integer('ID')->nullable(); // matches your SQL
            $table->text('Prepared')->nullable();
            $table->text('Checked')->nullable();
            $table->text('Approved')->nullable();
            $table->text('Released')->nullable();
            $table->text('Delivered')->nullable();
            $table->string('PlateNo', 50)->nullable();
            $table->text('Remarks')->nullable();
            $table->integer('printID')->nullable();

            // If you want auto timestamps
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveryInfo');
    }
};
