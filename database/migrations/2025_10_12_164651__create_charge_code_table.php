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
        Schema::create('charge_codes', function (Blueprint $table) {
            $table->id();
            $table->string('copen')->nullable();
            $table->boolean('used')->default(false);
            $table->string('phone_used')->nullable();
            $table->foreignId('operator_id')->nullable()->constrained('operators')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_codes');
    }
};
