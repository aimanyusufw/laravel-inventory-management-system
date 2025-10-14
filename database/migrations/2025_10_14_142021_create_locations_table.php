<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('type'); // RM_STORAGE, FG_STORAGE, QA_QUARANTINE, STAGING, MRO
            $table->boolean('is_active')->default(true);
            $table->decimal('capacity')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
