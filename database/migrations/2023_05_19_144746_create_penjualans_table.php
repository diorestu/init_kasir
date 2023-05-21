<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('payment_method', function (Blueprint $table) {
         $table->id();
         $table->string('method', 100);
         $table->double('tax', 10, 3);
         $table->double('discount', 10, 3);
         $table->timestamps();
      });
      Schema::create('order', function (Blueprint $table) {
         $table->id();
         $table->integer('user_id')->unsigned();
         $table->integer('payment_id')->unsigned();
         $table->double('total', 15, 3);
         $table->double('tax', 15, 3);
         $table->double('discount', 15, 3);
         $table->double('grand_total', 15, 3);
         $table->timestamps();
      });
      Schema::create('order_detail', function (Blueprint $table) {
         $table->id();
         $table->integer('order_id')->unsigned();
         $table->integer('barang_id')->unsigned();
         $table->double('qty', 15, 0);
         $table->double('price', 15, 0);
         $table->double('subtotal', 15, 0);
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
      Schema::dropIfExists('order');
   }
};
