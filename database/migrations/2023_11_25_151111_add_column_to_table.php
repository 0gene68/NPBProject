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
        Schema::table('tigers', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('buffaloes', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('carp', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('marines', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('baystars', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('hawks', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('giants', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('eagles', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('swallows', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('lions', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('dragons', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });

        Schema::table('fighters', function (Blueprint $table) {
            $table->boolean('nurture')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table', function (Blueprint $table) {
            //
        });
    }
};
