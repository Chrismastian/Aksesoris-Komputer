<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('telepon');
            $table->text('alamat');
            $table->unsignedBigInteger('total');
            $table->enum('status', ['pending', 'paid', 'shipped', 'cancelled'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            // Produk lives in five separate tables, so the id is kept alongside
            // the slug instead of a foreign key. See CategoryMap::MODELS.
            $table->string('category');
            $table->unsignedBigInteger('product_id');
            $table->string('nama');
            $table->unsignedBigInteger('harga');
            $table->unsignedInteger('qty');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
