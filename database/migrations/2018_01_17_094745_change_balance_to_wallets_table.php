<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBalanceToWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallets', function ($table) {
            $table->decimal('available_balance', 19, 8)->unsigned()->change();
            $table->decimal('pending_balance', 19, 8)->unsigned()->change();
        });

        Schema::table('fiat_wallets', function ($table) {
            $table->decimal('available_balance', 19, 8)->unsigned()->change();
            $table->decimal('pending_balance', 19, 8)->unsigned()->change();
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
