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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_slug');
            $table->string('blood_group');
            $table->string('slug');
            $table->string('requested_unit');
            $table->string('status')->default(2)->nullable(); // 1 for accepted, 2 for on hold, 3 for refused
            $table->string('note')->nullable();
            $table->date('needed_date');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
