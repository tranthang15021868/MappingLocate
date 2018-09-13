<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->nullable();
            $table->integer('utilities_id');
            $table->string('code', '255')->nullable();
            $table->string('collection_branch', 255)->nullable()->default(null);
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
        Schema::dropIfExists('postboxes');
    }
}
