<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
