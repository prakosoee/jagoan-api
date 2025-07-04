<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('level_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_number')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('roadmap_id')->constrained()->cascadeOnDelete();
            $table->string('participant_name');
            $table->string('roadmap_title');
            $table->string('level_title');
            $table->date('completion_date');
            $table->date('issue_date');
            $table->string('verification_code')->unique();
            $table->json('certificate_data')->nullable();
            $table->boolean('is_valid')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('level_certificates');
    }
};
