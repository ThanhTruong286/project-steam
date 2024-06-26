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
            $table->double('price')->nullable();
            $table->string('description');
            $table->integer('categories_id');
            $table->integer('dev_id');
            $table->string('image');
            $table->string('slug');
            $table->double('total_play_time');
            $table->double('sale');
            $table->double('old_price');
            $table->double('revenue')->nullable();
            $table->timestamps();
            $table->boolean('banner');
            //khoa ngoai la cot categories_id noi voi id ben bang categories
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('dev_id')->references('id')->on('developers')->onDelete('cascade');
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
