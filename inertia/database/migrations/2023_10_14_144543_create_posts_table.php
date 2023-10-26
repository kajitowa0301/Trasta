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
            $table->id('posts_id');
            $table->foreignId('user_id');
            $table->foreignId('prefecture_id');
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('src');
            $table->string('posts_name');
            $table->string('posts_comment');
            $table->string('address');
            $table->string('posts_type');
            $table->timestamps();

            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prefecture_id')->references('id')->on('prefectures');
            $table->foreign('category_id')->references('id')->on('categories');
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
