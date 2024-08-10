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
        Schema::create('users_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->foreignId('owner_id')->constrained('users');
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->index('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_projects');
    }
};
