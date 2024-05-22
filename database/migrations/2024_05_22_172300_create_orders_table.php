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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->integer('postcode')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->integer('shopping_id')->nullable();
            $table->integer('shopping_amount')->nullable();
            $table->integer('total_amount')->nullable();
            $table->string('payment_method', 255)->nullable();
            $table->integer('is_payment')->default(0);
            $table->integer('is_delete')->default(0);
            $table->integer('status')->default(0);
            $table->string('payment_data', 255)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('stripe_session_id', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
