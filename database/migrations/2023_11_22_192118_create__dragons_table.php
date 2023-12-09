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
        Schema::create('Dragons', function (Blueprint $table) {
            $table->string('backNumber')->primary();
            $table->string('name_kr');
            $table->string('name_jp');
            $table->string('birthDate');
            $table->string('throw_bat');
            $table->string('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_dragons');
    }
};
