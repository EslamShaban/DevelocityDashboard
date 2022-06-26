<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{

    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc');
            $table->string('img')->nullable();
            $table->foreignId('news_types_id')->references('id')->on('news__types')->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->references('id')->on('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('news');
    }
}
