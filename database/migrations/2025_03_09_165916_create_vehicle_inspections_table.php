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
        Schema::create('vehicle_inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_movement_id')->constrained('vehicle_movements')->onDelete('cascade');
            $table->string('inspection_no')->nullable();
            $table->string('inspection_date')->nullable();
            $table->enum('inspection_type', ["SGS", "3rd Party", "Agency", "Shipper", "Consignee", "Self"])->nullable();
            $table->string('inspection_by')->nullable();
            $table->string('inspection_result')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_inspections');
    }
};
