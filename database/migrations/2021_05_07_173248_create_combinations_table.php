<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained('effective_materials')->onDelete('cascade');
            $table->foreignId('commercial_id')->constrained('commercial_drugs')->onDelete('cascade');
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
        Schema::dropIfExists('combinations');
    }
}
