<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Hapus foreign key dan kolom user_id jika ada
            if (Schema::hasColumn('courses', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            // Tambahkan foreign key untuk tutor_id jika belum ada
            if (!Schema::hasColumn('courses', 'tutor_id')) {
                $table->unsignedBigInteger('tutor_id')->nullable()->after('id');
                $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Rollback: hapus tutor_id
            if (Schema::hasColumn('courses', 'tutor_id')) {
                $table->dropForeign(['tutor_id']);
                $table->dropColumn('tutor_id');
            }

            // Tambahkan kembali user_id jika perlu
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
