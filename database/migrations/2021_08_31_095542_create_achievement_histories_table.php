<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('achievement_histories', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('award_name', 200)->index();
            $table->string('appreciator', 200);
            $table->string('event_name', 200);
            $table->string('event_level', 200);
            $table->date('achieved_at');
            $table->tinyInteger('order_column')->default(1);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('achievement_histories');
    }
};
