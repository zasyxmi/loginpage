<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_timetables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('subject_id')
                ->nullable()
                ->constrained('subjects')
                ->nullOnDelete();

            $table->foreignId('day_id')
                ->nullable()
                ->constrained('days')
                ->nullOnDelete();

            $table->foreignId('hall_id')
                ->nullable()
                ->constrained('halls')
                ->nullOnDelete();

            $table->foreignId('lecturer_group_id')
                ->nullable()
                ->constrained('lecturer_groups')
                ->nullOnDelete();

            $table->string('time_from')->nullable();
            $table->string('time_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_timetables');
    }
};