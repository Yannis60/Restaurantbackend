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
        Schema::create('servings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('serving_date');
            $table->string('status');
            $table->string('remarks');
            $table->unsignedBigInteger('ordering_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ordering_id')->references('id')->on('orderings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servings');
    }
};
