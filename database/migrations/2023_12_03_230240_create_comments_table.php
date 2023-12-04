<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->text('message');
            $table->timestamps();

            $table->index('article_id', 'comments_article_idx');
            $table->index('user_id', 'comments_user_idx');

            $table->foreign('article_id', 'comments_article_fk')->on('articles')->references('id');
            $table->foreign('user_id', 'comments_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
