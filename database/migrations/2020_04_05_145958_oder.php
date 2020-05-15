<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Oder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCustomer');
            $table->date('NgayDat');
            $table->string('ThanhToan');
            $table->double('TongTien');
            $table->string('GhiChu');
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
