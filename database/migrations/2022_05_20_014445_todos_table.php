<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('todo_name', 255);
            $table->string('first_name', 500)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->integer('middle_name')->nullable();
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
        Schema::dropIfExists('todos_project');
    }
}
