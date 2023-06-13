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
      Schema::create('kategori_barang', function (Blueprint $table) {
         $table->id();
         $table->integer('user_id')->unsigned();
         $table->string('kategori', 100)->nullable();
         $table->string('keterangan', 160);
         $table->softDeletes();
         $table->timestamps();
      });

      Schema::create('merek_barang', function (Blueprint $table) {
         $table->id();
         $table->integer('user_id')->unsigned();
         $table->integer('supplier_id')->unsigned()->nullable();
         $table->string('merek', 100)->nullable();
         $table->softDeletes();
         $table->timestamps();
      });

      Schema::create('satuan_barang', function (Blueprint $table) {
         $table->id();
         $table->integer('user_id')->unsigned();
         $table->string('satuan', 100)->nullable();
         $table->string('deskripsi', 160)->nullable();
         $table->softDeletes();
         $table->timestamps();
      });

      Schema::create('barang', function (Blueprint $table) {
         $table->id();
         $table->integer('user_id')->unsigned();
         $table->integer('kategori_id')->unsigned();
         $table->integer('merek_id')->unsigned();
         $table->string('nama', 100);
         $table->string('deskripsi', 160)->nullable();
         $table->softDeletes();
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
      Schema::dropIfExists('barangs');
   }
};
