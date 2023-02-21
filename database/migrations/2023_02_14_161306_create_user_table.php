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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->timestamp("start")->nullable();
            $table->text("avatar")->nullable();
            $table->string("address")->nullable();
            $table->string("email")->unique();
            $table->string("phone");
            $table->unsignedBigInteger("role_id");
            $table->string("password");
            $table->enum("status", ["0", "1"]);
            $table->foreign("role_id")->on("role")->references("id");
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
        Schema::dropIfExists('user');
    }
};
