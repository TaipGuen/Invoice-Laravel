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
        Schema::create('user', function (Blueprint $table) {
            $table->id('userID');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('sex',['male','female']);
            $table->string('email');
            $table->string('phone');
            $table->string('username');
            $table->string('password');
            $table->date('birthdate');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
