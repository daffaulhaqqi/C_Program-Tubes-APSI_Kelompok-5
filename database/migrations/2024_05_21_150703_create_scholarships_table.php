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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organizer');
            $table->text('description');
            $table->string('requirement');
            $table->string('image');
            $table->dateTime('start_registration');
            $table->dateTime('end_registration');
            $table->dateTime('start_scholarship');
            $table->dateTime('end_scholarship');
            $table->enum('status', ['upcoming', 'registration', 'ongoing', 'finished']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
