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
      Schema::create('stok', function (Blueprint $table) {
         $table->id();
         $table->integer('barang_id')->unsigned();
         $table->dateTime('date_input')->nullable();
         $table->double('qty', 15, 0);
         $table->double('harga_beli', 15, 0);
         $table->double('harga_jual', 15, 0);
         $table->text('notes')->nullable();
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
      Schema::dropIfExists('stoks');
   }
};
