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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->string('legal_name');
            $table->string('trade_name');
            $table->string('gst')->nullable();
            $table->string('pan')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('state_id')->nullable()->constrained();
            $table->foreignId('group_id')->nullable()->constrained();
            $table->string('pincode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->enum('tax_type', ["REG", "SEZ", "COM"])->nullable();
            $table->boolean('is_tds_applicable')->default(false);
            $table->double('tds_rate')->default(0);
            $table->double('opening_balance')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
