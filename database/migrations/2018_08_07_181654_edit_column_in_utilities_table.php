<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumnInUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilities', function (Blueprint $table) {
            $table -> renameColumn('address_fr', 'address_ko');
            $table -> renameColumn('name_fr', 'name_ko');
            $table -> renameColumn('memo_fr', 'memo_ko');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilities', function (Blueprint $table) {
            $table -> renameColumn('address_ko', 'address_fr');
            $table -> renameColumn('name_ko', 'name_fr');
            $table -> renameColumn('memo_ko', 'memo_fr');
        });
    }
}
