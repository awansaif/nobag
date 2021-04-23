<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('Cascade');
            $table->mediumText('title');
            $table->foreignId('category_id')->constrained('blog_categories')->onDelete('Cascade');
            $table->text('body');
            $table->string('featured_image');
            $table->timestamps();
        });

        Schema::create('seller_blogs_tags', function (Blueprint $table) {
            $table->id();
            $table->string('seller_blog_id');
            $table->string('tag_title');
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
        Schema::dropIfExists('seller_blogs');
        Schema::dropIfExists('seller_blogs_tags');
    }
}
