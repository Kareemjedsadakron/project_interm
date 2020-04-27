<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('new_order');
            $table->string('delivery');
            $table->string('company');
            $table->string('cell');
            $table->string('company_sticker');
            $table->string('warranty_sticker'); 
            $table->string('list_product');
            $table->string('number');
            $table->string('annotation');
            $table->string('worker');
            $table->string('atatus');
            $table->string('check_job');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            //
        });
    }
}
