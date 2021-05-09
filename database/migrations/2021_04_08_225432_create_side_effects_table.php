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
            $table->id();
            $table->date('start_side_effect');
            $table->longText('severity');
            $table->boolean('sideshow_still');
            $table->date('date_end_side');
            $table->string('patient_condition');
            $table->smallInteger('inform_doctor');
            $table->string('doctor_name',30);
            $table->string('doctor_hospital',30);
            $table->string('doctor_phone',14);

            $table->foreignId('report_alert_drug_id')->constrained('report_alert_drugs')->onDelete('cascade');

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
