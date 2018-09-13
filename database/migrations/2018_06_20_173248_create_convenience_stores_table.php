<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvenienceStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenience_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('bussiness_hour')->nullable();
            $table->boolean('allow_eat_in')->nullable();
            $table->string('electronic_money')->nullable();
            $table->boolean('tax')->nullable();
            $table->text('package_shipping')->nullable();
            $table->text('package_receipt')->nullable();
            $table->string('locker')->nullable();
            $table->string('administrative_service')->nullable();
            $table->string('website')->nullable();
            $table->string('nearest_station')->nullable();
            $table->string('nearest_bus_stop')->nullable();
            $table->boolean('allow_receive_items')->nullable();
            $table->boolean('allow_send_items')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('utilities_id');
            $table->string('store_code')->nullable();
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
        Schema::dropIfExists('convenience_stores');
    }
}
