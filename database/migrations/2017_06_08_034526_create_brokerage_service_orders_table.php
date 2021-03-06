<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerageServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokerage_service_orders', function (Blueprint $table) {
          $table->increments('id');
          $table->decimal('deposit', 19, 2);
          $table->string('shipper', 200);
          $table->date('expectedArrivalDate');
          $table->date('arrivalDate');
          $table->string('arrivalArea',50);
          $table->string('freightType', 30);
          $table->string('freightBillNo', 30);
          $table->decimal('Weight', 15, 2);
          $table->string('statusType', 1);
          $table->integer('consigneeSODetails_id')->unsigned();
          $table->timestamps();
          $table->foreign('consigneeSODetails_id')-> references('id')->on('consignee_service_order_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brokerage_service_orders');
    }
}
