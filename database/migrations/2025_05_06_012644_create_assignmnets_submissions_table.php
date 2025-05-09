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
        Schema::create('assignmnets_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assingment_id')->constrained('assignments')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // mahasiswa yang mengumpulkan
            $table->string('file_path')->nullable();
            $table->string('description');
            $table->timestamp('submitted_at')->nullable();
            $table->float('grade')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignmnets_submissions');
    }
};
