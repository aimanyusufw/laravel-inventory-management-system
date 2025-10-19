<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('qc_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventory'); // Reference in inventories table
            $table->foreignId('user_id')->constrained('users'); // QC user who approved
            $table->timestamp('approved_at');
            $table->string('result'); // PASS, FAIL
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->string('qc_batch_number')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('qc_approvals');
    }
};
