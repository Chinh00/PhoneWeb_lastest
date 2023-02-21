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
            $table->string("name");
            $table->integer("quantity");
            $table->bigInteger("price");
            $table->bigInteger("sale_price")->nullable();
            $table->longText("content")->nullable();
            $table->enum("status", [0, 1]);

            $table->string("cpu");
            $table->string("display_size");
            $table->string("ram");
            $table->string("os");
            $table->string("pin");
            $table->string("camera");

            $table->enum("condition", [0, 1]);
            $table->unsignedBigInteger("guarantee_id");
            $table->unsignedBigInteger("brand_id");
            $table->foreign("brand_id")->on("brands")->references("id");
            $table->foreign("guarantee_id")->on("guarantee")->references("id");
            $table->timestamps();
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
