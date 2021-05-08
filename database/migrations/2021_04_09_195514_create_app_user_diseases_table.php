<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUserDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_user_diseases', function (Blueprint $table) {
            $table->id('us_di_no');
            $table->unsignedInteger('disease_no');
            $table->foreign('disease_no')->references('disease_no')->on('diseases');
            $table->unsignedInteger('app_user_no');
            $table->foreign('app_user_no')->references('app_user_no')->on('app_user');

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
        Schema::dropIfExists('chronic_diseases');
    }
}
