<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('image');
            $table->string('role');
            $table->string('github_link');
            $table->string('instagram_link');
            $table->string('linkedin_link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('developers');
        
    }
}
