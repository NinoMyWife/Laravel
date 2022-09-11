<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProofPathToFeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_lists', function (Blueprint $table) {
            $table->dropColumn('proof_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_lists', function (Blueprint $table) {
            $table->dropColumn('proof_path');
        });
    }
}
