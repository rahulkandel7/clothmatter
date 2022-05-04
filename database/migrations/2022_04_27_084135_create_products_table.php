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
            $table->string('sku');
            $table->string('price');
            $table->boolean('isDiscounted')->default(false);
            $table->boolean('isAvailable')->default(false);
            $table->string('discountedPrice')->nullable();
            $table->string('stock');
            $table->longText('description');
            $table->string('photopath1');
            $table->string('photopath2')->nullable();
            $table->string('photopath3')->nullable();
            $table->string('color');
            $table->string('brand');
            $table->string('size');
            $table->foreignId('category_id')->constrained();
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
