<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');

            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            
            $table->string('name');
            $table->date('execution_date')->nulleable();
            $table->tinyInteger('is_active')->nulleable()->default(1);

            $table->timestamps();

            $table->foreign('city_id')->references('city_id')->on('cities');
            $table->foreign('company_id')->references('company_id')->on('companies');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
