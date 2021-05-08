<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_number', function (Blueprint $table) {
            $table->id('batch_number_no');
            $table->string('batch_num');
            $table->string('barcode',20);

            $table->unsignedInteger('shipment_no');
            $table->foreign('shipment_no')->references('shipment_no')->on('shipments');

            $table->unsignedInteger('drug_no');
            $table->foreign('drug_no')->references('drug_no')->on('commercial_drug');

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
        Schema::dropIfExists('app_user');
    }
}
