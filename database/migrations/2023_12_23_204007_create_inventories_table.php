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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('donor_slug');
            $table->string('blood_group');
            $table->date('donate_date');
            $table->date('expire_date');
            $table->Integer('donate_unit');
            $table->Integer('transferred_unit');
            $table->Integer('remain_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
