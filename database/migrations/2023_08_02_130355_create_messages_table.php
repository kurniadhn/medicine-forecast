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
        Schema::create('Messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('type');
            $table->string('page');
            $table->string('medicine_name')->nullable();
            $table->integer('forecast_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Messages');
    }
};
