<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_posts', function (Blueprint $table) {
            $table->uuid("id")->unique();
            $table->string('title');
            $table->string("category", 40);
            $table->string("image_file");
            $table->string("filename");
            $table->text("content");
            $table->timestamps();
            $table->foreignUuid("user_id")->constrained("laravel_users", "id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laravel_posts');
    }
}
