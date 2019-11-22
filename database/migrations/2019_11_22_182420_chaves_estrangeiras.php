<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChavesEstrangeiras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('arquivos', function (Blueprint $table) {
          $table->foreign('ppcId')->references('id')->on('ppcs');
      });

      Schema::table('parecers', function (Blueprint $table) {
          $table->foreign('arquivoId')->references('id')->on('arquivos');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
