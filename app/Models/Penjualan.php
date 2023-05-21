<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
   use AutoNumberTrait;

   public function getAutoNumberOptions()
   {
      return [
         'order_code' => [
            'format' => 'INV/1.?/' . date('dmY'), // Format kode yang akan digunakan.
            'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
         ]
      ];
   }
}
