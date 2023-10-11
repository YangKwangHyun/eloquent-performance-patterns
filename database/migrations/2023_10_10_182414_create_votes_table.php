<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('feature_id')->constrained('features');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
