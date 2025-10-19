<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('wo_number')->unique();
            $table->foreignId('product_id')->constrained('products');
            $table->integer('qty_to_produce');
            $table->date('date_scheduled');
            $table->string('status'); // PLANNED, IN_PROCESS, COMPLETED
            $table->string('priority')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
};
