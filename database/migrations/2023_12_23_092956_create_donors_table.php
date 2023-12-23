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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->date('birthday');
            $table->string('gender');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('blood_group')->nullable();
            $table->string('photo')->nullable();
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
