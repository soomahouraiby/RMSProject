<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_drug', function (Blueprint $table) {
            $table->id('drug_no');
            $table->string('drug_name',50);
            $table->string('register_no',10);
            $table->string('drug_entrance',50);
            $table->longText('how_to_use');
            $table->string('drug_form',30);
            $table->longText('side_effects');
            $table->string('drug_photo');


            $table->unsignedInteger('company_no');
            $table->foreign('company_no')->references('company_no')->on('companies');

            $table->unsignedInteger('agent_no');
            $table->foreign('agent_no')->references('agent_no')->on('agents');

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
        Schema::dropIfExists('commercial_drug');
    }
}
