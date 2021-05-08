<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSideEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_effects', function (Blueprint $table) {
            $table->id('side_effect_no');
            $table->longText('side_effect');
            $table->date('date_st_effect');
            $table->string('range_dangerous',40);
            $table->string('status_patient_now',40);
            $table->string('side_effect_removed',5);
            $table->date('removed_date');

            $table->unsignedInteger('drug_user_no');
            $table->foreign('drug_user_no')->references('drug_user_no')->on('drug_user');

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
        Schema::dropIfExists('side_effects');
    }
}
