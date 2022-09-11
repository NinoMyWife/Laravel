<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStateIdToLinesFeePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lines_fee_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('fee_package_id');
            $table->foreign('fee_package_id')->references('id')->on('fee_packages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lines_fee_packages', function (Blueprint $table) {
            //
        });
    }
}
