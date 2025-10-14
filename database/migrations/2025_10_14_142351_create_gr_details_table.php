<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gr_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gr_id')->constrained('goods_receipts');
            $table->foreignId('item_id')->constrained('items');
            $table->decimal('received_qty', 15, 4);
            $table->foreignId('putaway_location_id')->constrained('locations');
            $table->string('lot_number');
            $table->boolean('is_verified')->default(false);
            $table->text('notes')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('gr_details');
    }
};
