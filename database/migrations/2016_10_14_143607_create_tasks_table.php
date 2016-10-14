<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('resource_type_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->foreign('resource_type_id')->references('id')->on('resource_types');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('name');
            $table->text('description');
            $table->date('due_date');
            $table->enum('status', ['open', 'progress', 'done', 'expired']);
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
        Schema::dropIfExists('tasks');
    }
}
