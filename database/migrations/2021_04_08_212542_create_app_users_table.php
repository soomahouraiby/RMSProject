<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {

            $table->id();
            $table->string('name',30);
            $table->string('email')->unique();
            $table->string('phone',14);
            $table->smallInteger('age');
            $table->boolean('sex');
            $table->string('address')->nullable();
            $table->string('adjective',60)->default('مواطن');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('report_count')->nullable();

            $table->rememberToken();

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
        Schema::dropIfExists('app_users');
    }
}
