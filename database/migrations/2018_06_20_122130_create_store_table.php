<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('supermarket', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->increments('id');
            $table->integer('store_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('utilities_id')->nullable();
            $table->integer('province_group_id')->nullable();
            $table->string('nearest_station',255)->nullable();
            $table->string('store_type',255)->nullable();
            $table->string('tel',255)->nullable();
            $table->string('business_hour',255)->nullable();
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
        Schema::connection('mysql')->dropIfExists('supermarket');
    }
}
