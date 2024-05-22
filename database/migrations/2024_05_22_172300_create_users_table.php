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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('role')->default(0);
            $table->timestamps();
            $table->tinyInteger('is_delete')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->string('passwordConfirm', 199);
            $table->integer('id_user')->nullable();
            $table->string('streetaddress', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->integer('postcode')->nullable();
            $table->integer('phone')->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
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
