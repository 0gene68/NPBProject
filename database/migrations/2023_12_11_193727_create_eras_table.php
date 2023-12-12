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
        Schema::create('eras', function (Blueprint $table) {
            $table->integer('ranks');
            $table->string('image');
            $table->string('name');
            $table->string('team');
            $table->string('era');
            $table->string('league');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eras');
    }
};
