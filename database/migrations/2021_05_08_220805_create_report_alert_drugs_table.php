<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAlertDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_alert_drugs', function (Blueprint $table) {

            $table->id();
            $table->string('user_name',30);
            $table->boolean('sex');
            $table->smallInteger('age');
            $table->integer('weight');
            $table->integer('length');
            $table->string('batch_number',30)->nullable();
            $table->longText('method_obtaining');
            $table->string('facility_name');
            $table->string('facility_address');
            $table->date('start_using_date');
            $table->string('take_drug');
            $table->string('purpose_use');
            $table->string('dosage');
            $table->date('stopped_using_date')->nullable();
            $table->boolean('stopped_using');
            $table->longText('describe_problem');

            $table->foreignId('types_report_id')->constrained('types_notices')->onDelete('cascade');
            $table->foreignId('app_user_id')->constrained('app_users')->onDelete('cascade');

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
        Schema::dropIfExists('report_alert_drugs');
    }
}
