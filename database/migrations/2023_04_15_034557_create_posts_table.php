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
        
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->boolean('price');
            $table->string('street');
            $table->string('name');
            $table->string('author');
            $table->string('adress');
            $table->longText('content');
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('cities_id');
            // $table->foreign('user_id')
            //     ->references('id')->on('users')
            //     ->onDelete('cascade');
            // $table->foreign('cities_id')
            //     ->references('id')->on('cities')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
