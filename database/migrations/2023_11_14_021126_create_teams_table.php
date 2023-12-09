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
        Schema::create('teams', function (Blueprint $table) {
            $table->string('logo');
            $table->string('team_id')->primary();
            $table->string('teamName');
            $table->string('foundationDate');
            $table->string('hometown');
            $table->string('homeStadium');
            $table->string('homepageLink');
            $table->unsignedBigInteger('winNumber');
            $table->integer('rank_2023');
            $table->string('league');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
