<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();               //constrained targets id of user table and cascadeOnDelete deletes the comment if the user is deleted
            $table->foreignId('blog_id')->constrained()->cascadeOnDelete();              //constrained targets id of blog table and cascadeOnDelete deletes the comment if the blog is deleted
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
        Schema::dropIfExists('comments');
    }
}
