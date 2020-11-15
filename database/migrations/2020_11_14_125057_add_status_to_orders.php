<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('status')->default(0)->after('pickup_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2020_11_14_122304_add_status_to_orders.php
            $table->dropColumn('status');
=======
            //
>>>>>>> 524f004df9f9c3addff998c9dc58a422cf580f20:database/migrations/2020_11_14_125057_add_status_to_orders.php
        });
    }
}