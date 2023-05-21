<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
   protected $table = 'stok';

   protected $guarded = ['id'];

   public function barang(): BelongsTo
   {
      return $this->belongsTo(Barang::class, 'barang_id', 'id');
   }
}
