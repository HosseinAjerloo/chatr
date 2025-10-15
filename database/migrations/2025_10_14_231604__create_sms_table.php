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
        Schema::create('smses', function (Blueprint $table) {
            $table->id();
            $table->string('mobile')->nullable();
            $table->string('messageText')->nullable();
            $table->string('number')->nullable();
            $table->enum('type',['send','receive'])->nullable();
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
        Schema::dropIfExists('smses');
    }
};
