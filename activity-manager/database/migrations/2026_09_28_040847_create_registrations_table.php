<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Buat tabel registrations
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            $table->string('participant_name');
            $table->string('email');
            $table->timestamp('registered_at')->nullable();
            $table->timestamps();

            // Constraint unik agar 1 email tidak bisa daftar 2x di activity yang sama (IC-03)
            $table->unique(['activity_id', 'email']); 
        });

        // 2. Tambahkan kolom pendukung ke tabel activities
        Schema::table('activities', function (Blueprint $table) {
            $table->unsignedInteger('registered_count')->default(0);
            $table->unsignedInteger('capacity')->default(10);
            $table->timestamp('start_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');

        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['registered_count', 'capacity', 'start_at']);
        });
    }
};