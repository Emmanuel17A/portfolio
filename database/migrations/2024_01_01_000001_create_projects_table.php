<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->string('category')->default('web'); // web, mobile, api, enterprise, other
            $table->json('technologies')->nullable();
            $table->json('features')->nullable();
            $table->string('image_path')->nullable();
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('status')->default('dev'); // live, dev, archived
            $table->boolean('is_featured')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
