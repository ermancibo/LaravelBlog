<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table("articles",function($table){
            $table->foreign("category_id","article_category_fk")->references("id")->on("categories")->onDelete('cascade');
        });

        Schema::table("articles",function($table){
            $table->foreign("user_id","article_user_fk")->references("id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
