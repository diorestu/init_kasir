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
      Schema::create('cabang', function (Blueprint $table) {
         $table->id();
         $table->string('nama_cabang', 100);
         $table->string('telp_cabang', 40)->nullable();
         $table->text('alamat_cabang')->nullable();
         $table->enum('tipe', ['pusat', 'cabang']);
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
      Schema::dropIfExists('cabangs');
   }
};
