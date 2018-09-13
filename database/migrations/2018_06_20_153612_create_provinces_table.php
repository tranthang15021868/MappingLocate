<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('provinces', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->integer('area_id')->nullable();
            $table->integer('pref_code')->nullable();
            $table->string('slug',255);
            $table->string('name',255);
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
        Schema::connection('mysql')->dropIfExists('provinces');
    }
}
