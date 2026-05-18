<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_timetables', function (Blueprint $table) {
            if (! Schema::hasColumn('student_timetables', 'student_id')) {
                $table->foreignId('student_id')
                    ->nullable()
                    ->constrained('students')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('student_timetables', function (Blueprint $table) {
            if (Schema::hasColumn('student_timetables', 'student_id')) {
                $table->dropConstrainedForeignId('student_id');
            }
        });
    }
};
