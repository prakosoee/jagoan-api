<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('roadmap_id')->constrained()->cascadeOnDelete();
            $table->timestamp('enrolled_at')->useCurrent();
            $table->timestamp('started_at')->nullable();
            $table->foreignId('current_level_id')->nullable()->constrained('levels');
            $table->foreignId('current_course_id')->nullable()->constrained('courses');
            $table->enum('status', ['enrolled', 'in_progress', 'completed'])->default('enrolled');
            $table->timestamps();

            $table->unique(['user_id', 'roadmap_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
