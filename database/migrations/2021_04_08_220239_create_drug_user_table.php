<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_user', function (Blueprint $table) {
            $table->id('drug_user_no');
            $table->string('drug_user_name',30);
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('gender',6);


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
        Schema::dropIfExists('drug_user');
    }
}
