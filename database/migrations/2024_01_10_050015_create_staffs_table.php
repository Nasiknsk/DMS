<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Your migration file
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nic');
            $table->string('phone');
            $table->string('code');
            $table->integer('status')->default(1);
            $table->integer('type');
            $table->rememberToken();
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
