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
        Schema::create('sach', function (Blueprint $table) {
            $table->string('masach')->primary();
            $table->string('tensach');
            $table->bigInteger('soluong');
            $table->bigInteger('gia');
            $table->string('maloai');
            $table->bigInteger('sotap');
            $table->string('anh')->nullable(true);
            $table->date('ngaynhap')->nullable(true);
            $table->string('tacgia');
            $table->foreign('maloai')->references('maloai')->on('loai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sach');
    }
};
