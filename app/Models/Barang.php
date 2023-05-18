<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
   protected $table = 'barang';

   protected $guarded = ['id'];

   public function kategori(): BelongsTo
   {
       return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
   }
}
