<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinesFeePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines_fee_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->dateTime('date');
            $table->unsignedBigInteger('fee_list_id');
            $table->foreign('fee_list_id')->references('id')->on('fee_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lines_fee_packages');
    }
}
