<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('newcustomer', function (Blueprint $table) {
            $table->bigInteger('ID')->primary(); // ID NOT NULL
            $table->text('CUSTOMER')->nullable();
            $table->text('ADDRESS')->nullable();
            $table->integer('ISDELETED')->nullable();
            $table->string('CUSTOMER_CODE', 50)->nullable();
            $table->string('TIN_NO', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newcustomer');
    }
};
