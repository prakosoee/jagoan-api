<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_progress_id')->constrained()->cascadeOnDelete();
            $table->integer('attempt_number');
            $table->json('answers')->nullable();
            $table->integer('score')->default(0);
            $table->integer('total_questions');
            $table->integer('correct_answers')->default(0);
            $table->boolean('is_passed')->default(false);
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
