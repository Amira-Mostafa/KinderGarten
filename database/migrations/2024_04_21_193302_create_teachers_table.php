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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email');
            //$table->foreignId('subject_id')->constrained('subjects');
            $table->string('fb');
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->string('profileImage', 100);
            $table->boolean('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

            // $table->float('price');
            // $table->foreignId('category_id')->constrained('categories');
            // // $table->foreignId('user-Id')->constrained('users');
            // $table->softDeletes();
            // $table->foreignId('user_id')->nullable()->index();
