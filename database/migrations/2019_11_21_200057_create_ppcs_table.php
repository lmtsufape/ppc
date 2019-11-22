<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('dataInicio');
            $table->dateTime('dataAtualizacao');
            $table->string('status');
            $table->year('ano');
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
        Schema::dropIfExists('ppcs');
    }
}
