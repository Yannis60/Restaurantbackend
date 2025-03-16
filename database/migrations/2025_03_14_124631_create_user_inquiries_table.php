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
        Schema::create('user_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->string("email");
            $table->string("subject");
            $table->string("message");
            $table->unsignedBigInteger("user_inquiry_type_id");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_inquiry_type_id')->references('id')->on('user_inquiry_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_inquiries');
    }
};
