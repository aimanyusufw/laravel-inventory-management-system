<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gi_id')->constrained('goods_issues');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('issued_qty');
            $table->foreignId('picking_location_id')->constrained('locations');
            $table->text('notes')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('gi_details');
    }
};
