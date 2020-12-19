<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laravel_users', function (Blueprint $table) {
            $table->uuid("id")->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string("username")->unique();
            $table->string("job_title")->default("");
            $table->string("image_file")->default("https://kenzy-blog-files.s3.af-south-1.amazonaws.com/profile-pics/default.jpg");
            $table->string("facebook_link")->default("");
            $table->string("linkedin_link")->default("");
            $table->string("instagram_link")->default("");
            $table->string("twitter_link")->default("");
            $table->string("location")->default("");
            $table->text("bio")->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laravel_users');
    }
}
