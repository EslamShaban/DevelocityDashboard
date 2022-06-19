<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreignId('admin_id')->references('id')->on('admins')->cascadeOnDelete();
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->enum('status' , ['waiting' , 'rejected' , 'approve', 'complete' , 'edit'])->nullable();
            $table->text('message')->nullable();
            $table->string('start_date');
            $table->string('end_date');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
