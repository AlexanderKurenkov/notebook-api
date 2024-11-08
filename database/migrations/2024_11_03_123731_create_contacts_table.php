<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // выполнить миграции
    public function up(): void
    {
		Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->date('birth_date')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    // отменить миграции
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
