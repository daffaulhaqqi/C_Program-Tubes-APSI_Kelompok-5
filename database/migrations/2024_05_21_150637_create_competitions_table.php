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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('organizer');
            $table->text('description');
            $table->string('rules');
            $table->string('image');
            $table->dateTime('start_registration');
            $table->dateTime('end_registration');
            $table->dateTime('start_competition');
            $table->dateTime('end_competition');
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
        Schema::dropIfExists('competitions');
    }
};
