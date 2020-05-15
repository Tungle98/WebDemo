<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->integer('idType')->unsigned();
            $table->foreign('idType')->references('id')->on('ProductType');
            $table->text('MoTa');
            $table->float('DonViGia');
            $table->float('GiaKM');
            $table->string('Hinh');
            $table->string('DonVi');
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
        //
    }
}
