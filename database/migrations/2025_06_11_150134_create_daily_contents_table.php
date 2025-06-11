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
    Schema::create('daily_contents', function (Blueprint $table) {
        $table->id();
        $table->date('date')->unique(); // hanya satu konten per hari
        $table->string('vocab');        // contoh: "elaborate"
        $table->text('meaning');        // contoh: "to explain something in detail"
        $table->string('grammar');      // contoh: "Present Perfect"
        $table->text('explanation');    // penjelasan grammar
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_contents');
    }
};
