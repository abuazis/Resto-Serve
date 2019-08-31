<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_orders', function (Blueprint $table) {
            $table->foreign('id_order')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('menus')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_orders', function (Blueprint $table) {
            //
        });
    }
}
