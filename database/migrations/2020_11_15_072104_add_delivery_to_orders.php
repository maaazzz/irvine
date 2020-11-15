<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('approve_date')->nullable()->after('pickup_notes');
            $table->string('delivery_date')->nullable()->after('approver_notes');
            $table->text('delivery_notes')->nullable()->after('delivery_date');
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
            $this->dropColumn('approve_date', 'delivery_date', 'delivery_notes');
        });
    }
}
