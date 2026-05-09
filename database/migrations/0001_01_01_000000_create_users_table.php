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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->longText('address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

//Why you save user data (Admin yang kita register awal tu) and show into student list? student list only can be shown when we add them in CRUD student add , so student bukan user okey faham? 
//untuk user data jgn show yang kita register tu
//aku taknak kau samakan user ( yang kita register to web ni) dengan student faham? aku rasa kau terkeliru ni, website mamangement ni untuk user (Admin sahaja)
//For timetable section, i think you little bit wrong here , why we need to select student? , for CRUD add table entries section aku nak 'select student name' to tukar kepada 'select lecturer name (ambil dari database subject list )'
// so view entries pun akan tukar from student to lecturer
