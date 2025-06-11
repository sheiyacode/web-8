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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('class_name')->nullable();
            $table->unsignedBigInteger('tutor_id')->nullable()->after('class_name');

            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('set null');

            // Jika user_id tidak dipakai:
            // $table->dropForeign(['user_id']);
            // $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
