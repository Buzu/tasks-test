<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->date('due_date');
            // Not a fan of ENUM.
            $table->string('status', 1);
            $table->timestamps();
            // I like my foreign keys to be together at the end of the table
            $table->integer('resource_id')->unsigned();
            $table->integer('team_id')->unsigned();

            // In case it is not clear, I try to stay under 80 char columns
            $table->foreign('resource_id')->references('id')
                ->on('resource_types');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_tasks');
    }
}
