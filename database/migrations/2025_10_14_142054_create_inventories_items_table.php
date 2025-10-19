<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('part_number')->unique();
            $table->string('name');
            $table->foreignId('unit_id')->constrained('units'); // Referensi ke units
            $table->boolean('is_injection_part')->default(false); // Komponen dari proses injection
            $table->boolean('is_raw_material')->default(true); // Material dibeli
            $table->decimal('safety_stock')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('location_id')->constrained('locations');
            $table->decimal('quantity', 15, 4);
            $table->string('lot_number');
            $table->string('date_code')->nullable();
            $table->string('msl_level')->nullable();
            $table->string('status')->default('QUARANTINE'); // QUARANTINE, AVAILABLE, RESERVED

            $table->decimal('reserved_qty', 15, 4)->default(0); // Stok yang dialokasikan untuk WO
            $table->timestamp('received_at');
            $table->timestamp('last_counted_at')->nullable();
            $table->unique(['item_id', 'location_id', 'lot_number']);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('inventory');
    }
};
