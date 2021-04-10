<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_user', function (Blueprint $table) {
            $table->id('app_user_no');
            $table->string('app_user_name',30);
            $table->string('character',100);
            $table->string('app_user_phone',14);
            $table->string('app_user_email',40);
            $table->integer('age');
            $table->string('gender',6);
            $table->date('date_of_birth');
            $table->integer('number_of_report');


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
