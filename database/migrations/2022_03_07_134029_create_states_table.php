<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('label');
        });
        DB::table('states')->insert(
            array(
                'label' => 'Saisie clôturée',
            )
        );
        DB::table('states')->insert(
            array(
                'label' => 'Fiche créée, saisie en cours',
            )
        );
        DB::table('states')->insert(
            array(
                'label' => 'Remboursée',
            )
        );
        DB::table('states')->insert(
            array(
                'label' => 'Validée et mise en paiement',
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
        Schema::dropIfExists('states');
    }
}
