<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('about');
            $table->string('email');
            $table->string('mobile');
            $table->integer('tax');
            $table->integer('shipping_cost');
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
