<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
   use SoftDeletes;

   protected $table = 'kategori_barang';

   protected $guarded = ['id'];

   public function barang(): HasMany
   {
      return $this->hasMany(Barang::class, 'kategori_id', 'id');
   }
   public function merk(): HasMany
   {
      return $this->hasMany(Merk::class, 'kategori_id', 'id');
   }
}
