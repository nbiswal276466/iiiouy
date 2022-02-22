<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCryptoFieldsToWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->unsignedBigInteger('available_balance')->default(0)->change();
            $table->unsignedBigInteger('pending_balance')->default(0)->change();
            $table->unsignedBigInteger('withdraw_pending_balance')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallets', function (Blueprint $table) {
            $table->decimal('available_balance', 19, 8)->default(0)->change();
            $table->decimal('pending_balance', 19, 8)->default(0)->change();
            $table->decimal('withdraw_pending_balance', 19, 8)->default(0)->change();
        });
    }
}
