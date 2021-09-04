<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->index();
            $table->string('organizer_name', 200)->index();
            $table->string('external_url', 200)->nullable();
            $table->tinyInteger('type')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
