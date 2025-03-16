<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('details', 1000);
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('portion_id');
            $table->unsignedBigInteger('restaurant_id');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('portion_id')->references('id')->on('portions');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
