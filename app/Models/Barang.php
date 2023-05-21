<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
   public function merk(): BelongsTo
   {
      return $this->belongsTo(Merk::class, 'merek_id', 'id');
   }

   public function stok(): HasMany
   {
      return $this->hasMany(Stok::class, 'barang_id', 'id');
   }

   public function getStok()
   {
      $qty = Stok::where('barang_id', '=', $this->id)->sum('qty');
      return $qty;
   }
   public function getHargaJual()
   {
      $qty = Stok::where('barang_id', '=', $this->id)->latest()->first();
      return $qty->harga_jual;
   }
   public function getHargaBeli()
   {
      $qty = Stok::where('barang_id', '=', $this->id)->latest()->first();
      return $qty->harga_beli;
   }
}
