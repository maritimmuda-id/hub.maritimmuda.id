<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 50)->nullable()->index();
            $table->string('name', 200)->index();
            $table->tinyInteger('gender')->default(0);
            $table->string('email', 200)->index();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('linkedin_profile', 200)->nullable();
            $table->string('instagram_profile', 200)->nullable();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('first_expertise_id')->nullable()->constrained('expertises');
            $table->foreignId('second_expertise_id')->nullable()->constrained('expertises');
            $table->text('bio')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
