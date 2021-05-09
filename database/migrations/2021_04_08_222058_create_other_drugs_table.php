<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('dosage');
            $table->date('start_use_date');
            $table->date('end_use_date');
            $table->longText('purpose_use');

            $table->foreignId('side_effect_id')->constrained('side_effects')->onDelete('cascade');

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
        Schema::dropIfExists('other_drugs');
    }
}
