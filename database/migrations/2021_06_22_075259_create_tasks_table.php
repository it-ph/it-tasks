<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');

            //$table->string('team');
            $table->unsignedBigInteger('type_id');

            $table->string('task_name');
            $table->string('product_owner');
            $table->string('start_date')->nullable();
            $table->string('target_completion')->nullable();

            $table->unsignedBigInteger('status_id');

            $table->string('remarks')->nullable();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('status_id')->references('id')->on('stats');

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
