<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BarangFactory extends Factory
{
   public function definition()
   {
      return [
         'nama'        => $this->faker->company(),
         'deskripsi'   => $this->faker->address(),
         'kategori_id' => rand(1, 10),
         'merek_id'    => rand(1, 4),
         'user_id'    => rand(1, 2),
      ];
   }
}
