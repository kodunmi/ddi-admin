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

    // 'title', 'created_by', 'body', 'preview', 'feature', 'image', 'date'
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->longText('body');
            $table->string('created_by');
            $table->date('date');
            $table->longText('preview');
            $table->boolean('feature')->default(false);
            $table->string('public_id');
            $table->string('secure_url');
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
        Schema::dropIfExists('posts');
    }
}
