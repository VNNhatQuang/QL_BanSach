<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id('mahoadon');
            $table->unsignedBigInteger('makh');
            $table->date('ngaymua');
            $table->bigInteger('damua');
            $table->string('diachi');
            $table->string('sodienthoai');
            $table->foreign('makh')->references('makh')->on('khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
};
