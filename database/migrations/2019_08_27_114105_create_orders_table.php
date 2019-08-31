<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->char('id', 8)->primary();
            $table->unsignedBigInteger('id_user');
            $table->string('nama_pelanggan', 100);
            $table->enum('no_meja', ['01', '02', '03'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('waktu_order', 30);
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
