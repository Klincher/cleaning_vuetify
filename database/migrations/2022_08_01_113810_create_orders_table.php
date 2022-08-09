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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->enum('status', ['created', 'paid', 'completed', 'canceled'])->default('created');
            $table->double('sum');
            $table->string('address');
            $table->integer('area');
            $table->integer('rooms')->default(0);
            $table->double('bathrooms')->default(0);
            $table->integer('kitchens')->default(0);
            $table->integer('fridges')->default(0);
            $table->integer('wardrobes')->default(0);
            $table->integer('animals')->default(0);
            $table->integer('adults')->default(0);
            $table->integer('children')->default(0);
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
        Schema::dropIfExists('orders');
    }
};
