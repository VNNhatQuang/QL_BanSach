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
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->id('macthd');
            $table->string('masach');
            $table->integer('soluongmua');
            $table->unsignedBigInteger('mahoadon');
            $table->foreign('mahoadon')->references('mahoadon')->on('hoadon');
            $table->foreign('masach')->references('masach')->on('sach');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethoadon');
    }
};
