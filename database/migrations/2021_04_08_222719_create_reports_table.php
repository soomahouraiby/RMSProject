<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_no');
            $table->date('report_date');
            $table->longText('notes_user');
            $table->string('district',20);
            $table->string('authors_name',50);
            $table->string('authors_phone',9);
            $table->string('authors_adjective',30);
            $table->integer('authors_age');
            $table->string('drug_picture');
            $table->string('commercial_name',30);
            $table->string('material_name',30);
            $table->string('company_name',50);
            $table->string('agent_name',50);
            $table->date('transfer_date');
            $table->string('transfer_party',30);
            $table->string('report_statues',30);
            $table->text('opmanage_notes');
            $table->integer('state')->default(0);

            $table->unsignedInteger('type_report_no');
            $table->foreign('type_report_no')->references('type_report_no')->on('types_reports');

            $table->unsignedInteger('app_user_no');
            $table->foreign('app_user_no')->references('app_user_no')->on('app_user');

            $table->unsignedInteger('drug_no');
            $table->foreign('drug_no')->references('drug_no')->on('commercial_drug');

            $table->unsignedInteger('site_no');
            $table->foreign('site_no')->references('site_no')->on('site');

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
        Schema::dropIfExists('reports');
    }
}
