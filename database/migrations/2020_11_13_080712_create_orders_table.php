<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('account_number_id');
            $table->unsignedBigInteger('project_number_id');
            $table->unsignedBigInteger('shopper_id');
            $table->unsignedBigInteger('approver_id');
            $table->unsignedBigInteger('justification_id');

            $table->integer('purchase_qty');
            $table->float('purchase_total');
            $table->date('date_needed');
            $table->string('delivery_type');
            $table->string('pickup_notes');
            $table->string('approver_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}