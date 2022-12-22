<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->integer('storeId');
            $table->integer('price');
            $table->integer('discountPrice')->nullable();
            // $table->boolean('flag')->default(false);
            $table->tinyInteger('trending')->default('0')->comment('0=notTrend,1=trend');
            $table->tinyInteger('status')->default('0')->comment('0=visible,1=hidden');
            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
