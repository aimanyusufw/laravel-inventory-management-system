<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bill_of_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products'); // Produk akhir
            $table->foreignId('item_id')->constrained('items'); // Komponen yang dibutuhkan
            $table->decimal('required_qty', 15, 4);
            $table->text('notes')->nullable();
            $table->boolean('is_optional')->default(false);
            $table->unique(['product_id', 'item_id']); // Satu komponen hanya sekali di satu BOM
        });
    }
    public function down()
    {
        Schema::dropIfExists('bill_of_materials');
    }
};
