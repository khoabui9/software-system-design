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
            $table->string('name')->unique();
            $table->string('description');
            $table->integer('project_id')->unsigned()->nullable();
			$table->foreign('project_id')->references('id')
			            ->on('projects')->onDelete('cascade');
            $table->integer('card_id')->unsigned()->nullable();
            $table->foreign('card_id')->references('id')
			            ->on('cards')->onDelete('cascade');
            $table->DATETIME('date_created')->nullable();
            $table->DATETIME('date_ended')->nullable();
            //$table->primary('id');
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
