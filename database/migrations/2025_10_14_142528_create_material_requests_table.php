<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('material_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wo_id')->constrained('work_orders');
            $table->foreignId('item_id')->constrained('items');
            $table->decimal('requested_qty', 15, 4);
            $table->decimal('picked_qty', 15, 4)->default(0);
            $table->string('status'); // PENDING, PICKING, FULFILLED
            $table->foreignId('picked_by_user_id')->nullable()->constrained('users');
            $table->timestamp('picked_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('material_requests');
    }
};
