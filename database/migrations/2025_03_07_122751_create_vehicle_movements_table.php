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
        Schema::create('vehicle_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained('parties')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('parties')->onDelete('cascade')->nullable();
            $table->foreignId('cargo_id')->constrained('cargos')->onDelete('cascade');
            $table->foreignId('godown_id')->constrained('godowns')->onDelete('cascade')->nullable();
            $table->enum('type', ['load', 'unload']);
            $table->enum('movement_type', ['vehicle', 'rail', 'godown_shifting', 'party_shifting', 'opening', 'shortage', 'excess']);
            $table->timestamp('movement_at');
            $table->double('net_weight')->default(0);
            $table->double('gross_weight')->default(0);
            $table->double('tare_weight')->default(0);
            $table->string('vehicle_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_no')->nullable();
            $table->string('driver_lic_no')->nullable();
            $table->string('lr_no')->nullable();
            $table->string('lr_date')->nullable();
            $table->string('rr_number')->nullable();
            $table->string('rr_date')->nullable();
            $table->boolean('is_direct')->default(false);
            $table->boolean('is_inspection')->default(false);
            $table->string('receipt_no')->nullable();
            $table->string('receipt_date')->nullable();
            $table->foreignId('ref_movement_id')->constrained('vehicle_movements')->onDelete('cascade')->nullable();
            $table->string('vessel_name')->nullable();
            $table->date('vessel_date')->nullable();
            $table->string('loading_port')->nullable();
            $table->date('loading_country')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('container_type')->nullable();
            $table->integer('container_no')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_movements');
    }
};
