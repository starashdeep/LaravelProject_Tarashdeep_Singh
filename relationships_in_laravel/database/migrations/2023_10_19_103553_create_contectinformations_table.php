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
        Schema::create('contectinformations', function (Blueprint $table) {
            $table->id();
            $table->string('pincode');
            $table->string('near_by')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('extra_detail')->nullable();

            $table->foreignId('contect_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contectinformations');
    }
};
