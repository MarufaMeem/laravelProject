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
        Schema::create('orders_item', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->string('color_name', 255)->nullable();
            $table->integer('total_price')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_item');
    }
};
