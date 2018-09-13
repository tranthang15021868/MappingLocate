<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->nullable();
            $table->text('memo')->nullable();
            $table->string('address_vi')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_cn')->nullable();
            $table->string('address_es')->nullable();
            $table->string('address_fr')->nullable();
            $table->string('name_vi')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_cn')->nullable();
            $table->string('name_es')->nullable();
            $table->string('name_fr')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('memo_vi')->nullable();
            $table->text('memo_en')->nullable();
            $table->text('memo_cn')->nullable();
            $table->text('memo_es')->nullable();
            $table->text('memo_fr')->nullable();
            $table->string('workingtime_weekday')->nullable();
            $table->string('workingtime_saturday')->nullable();
            $table->string('workingtime_holiday')->nullable();
            $table->string('workingtime_before_holiday')->nullable();
            $table->string('type');
            $table->integer('icon_tags_id')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('utilities');
    }
}
