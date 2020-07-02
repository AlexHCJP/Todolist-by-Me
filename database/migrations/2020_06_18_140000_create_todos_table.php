<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->unsignedBigInteger('list_todo_id');
            $table->smallInteger('status');
            $table->timestamps();
            $table->foreign('list_todo_id')
                ->references('id')
                ->on('list_todos')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
