<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportSideEffectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_side_effects', function (Blueprint $table) {
            $table->id('report_side_effect_no');
            $table->date('date_start_use');
            $table->longText('dose');
            $table->string('status_stop_use',5);
            $table->date('date_stop_use');
            $table->string('Relation_with_patient',50);
            $table->date('expiration_date');
            $table->longText('purpose_of_use');
            $table->Text('how_get_drug');
            $table->longText('how_use_drug');

            $table->unsignedInteger('report_no');
            $table->foreign('report_no')->references('report_no')->on('reports');

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
        Schema::dropIfExists('report_side_effects');
    }
}
