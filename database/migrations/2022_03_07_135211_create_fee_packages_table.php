<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_packages', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('amount');
        });
        DB::table('fee_packages')->insert(
            array(
                'label' => 'Forfait Etape',
                'amount'=> 11000
            )
        );
        DB::table('fee_packages')->insert(
            array(
                'label' => 'Frais Kilométrique',
                'amount'=> 62
            )
        );
        DB::table('fee_packages')->insert(
            array(
                'label' => 'Nuitée Hôtel',
                'amount'=> 8000
            )
        );
        DB::table('fee_packages')->insert(
            array(
                'label' => 'Repas Restaurant',
                'amount'=> 2500
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_packages');
    }
}
