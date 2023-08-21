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

        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('name', 200);
            $table->string('role', 200);
            $table->string('institution_name', 200);
            $table->string('sponsor_name', 200);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->tinyInteger('order_column')->default(1);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
