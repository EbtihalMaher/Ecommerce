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
        Schema::create('stores', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('logoImage')->nullable();
            $table->tinyInteger('popular')->default('0')->comment('0=notPopular,1=popular');
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
        Schema::dropIfExists('stores');
    }
};
