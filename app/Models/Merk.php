<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merk extends Model
{
   use SoftDeletes;

   protected $table = 'merek_barang';

   protected $guarded = ['id'];

   public function barang(): HasMany
   {
      return $this->hasMany(Barang::class, 'merek_id', 'id');
   }
}
