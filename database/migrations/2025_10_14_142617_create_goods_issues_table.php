<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('goods_issues', function (Blueprint $table) {
            $table->id();
            $table->string('gi_number')->unique();
            $table->foreignId('so_id')->nullable()->constrained('sales_orders');
            $table->date('issue_date');
            $table->foreignId('user_id')->constrained('users');
            $table->string('status');
            $table->string('carrier_name')->nullable();
            $table->string('tracking_number')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('goods_issues');
    }
};
