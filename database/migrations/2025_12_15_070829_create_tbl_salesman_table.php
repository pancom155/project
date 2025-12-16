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
       Schema::create('tbl_salesman', function (Blueprint $table) {
    $table->string('Salesman_ID')->nullable();
    $table->string('Salesman_name')->nullable();
    $table->string('ID')->nullable();
    $table->string('Salesman_ADD')->nullable();
    $table->string('Contact_number')->nullable();
    $table->string('Nickname')->nullable();
    $table->dateTime('Reg_date')->nullable();
    $table->string('REMARKS')->nullable();
    $table->string('Stat')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_salesman');
    }
};
