<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('register_no',15)->unique();
            $table->string('drug_entrance',50);
            $table->Text('how_use');
            $table->string('drug_form',30);
            $table->Text('side_effects');
            $table->string('photo')->nullable();

            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('agents')->onDelete('cascade');


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
        Schema::dropIfExists('commercial_drugs');
    }
}
