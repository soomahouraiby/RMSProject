<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_drug', function (Blueprint $table) {
            $table->id('o_drug_no');
            $table->string('drug_name',30);
            $table->longText('dose');
            $table->date('date_start_use');
            $table->date('date_end_use');
            $table->longText('purpose_of_use');

            $table->unsignedInteger('report_side_effects_no');
            $table->foreign('report_side_effects_no')
                ->references('report_side_effects_no')->on('report_side_effects_no');

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
        Schema::dropIfExists('other_drug');
    }
}
