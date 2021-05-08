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
            $table->id();
            $table->foreignId('app_user_id')->constrained('app_users')->onDelete('cascade');
            $table->smallInteger('batch_number');
            $table->foreignId('types_report_id')->constrained('types_notices')->onDelete('cascade');
            $table->date('date');
            $table->longText('notes_user')->nullable();
            $table->longText('district')->nullable();
            $table->string('commercial_name')->nullable();
            $table->string('material_name')->nullable();
            $table->decimal('drug_picture', 10, 2)->nullable();
            $table->string('companies_name')->nullable();
            $table->string('agent_name')->nullable();
            $table->dateTime('transfe_date')->nullable();
            $table->string('transfer_party')->nullable();
            $table->smallInteger('report_statuses')->default('0');
            $table->longText('opmanage_notes')->nullable();
            $table->boolean('state')->nullable();
            $table->string('pharmacy_title')->nullable();
            $table->string('street_name')->nullable();
            $table->string('neig_name')->nullable();
            $table->longText('site_dec')->nullable();
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->boolean('source')->nullable();
            $table->string('amount_name')->nullable();
            $table->smallInteger('phone')->nullable();
            $table->boolean('sex')->nullable();
            $table->smallInteger('age')->nullable();
            $table->string('adjective')->nullable();
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
