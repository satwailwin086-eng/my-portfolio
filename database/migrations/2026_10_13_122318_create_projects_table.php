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
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('subtitle')->nullable();
        $table->text('description');
        $table->string('image')->nullable();
        $table->string('technologies')->nullable();
        $table->string('project_url')->nullable();
        $table->string('github_url')->nullable();
        $table->boolean('is_visible')->default(true);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('projects');
}
    
};
