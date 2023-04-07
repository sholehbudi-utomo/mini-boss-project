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
        Schema::table('producs', function (Blueprint $table) {
            $table->foreIgnid('categori_id');
            $table->foreign('categori_id')->references('id')->on('categoris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producs', function (Blueprint $table) {
            $table->dropColumn('categori_id');
        });
    }
};
