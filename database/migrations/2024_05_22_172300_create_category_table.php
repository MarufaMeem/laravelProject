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
        Schema::create('category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->integer('status')->default(0);
            $table->integer('is_delete')->default(0);
            $table->dateTime('updated_at')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('button_name', 255)->nullable();
            $table->integer('is_home')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
