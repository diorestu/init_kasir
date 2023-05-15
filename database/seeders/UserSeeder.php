<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $role = Role::create(['name' => 'admin']);

      $user = User::create([
         'name' => 'Master Admin',
         'phone' => '123',
         'address' => 'Indonesia',
         'username' => 'masteradmin',
         'password' => bcrypt('rahasia2023'),
         'url_photo' => '',
         'remember_token' => Str::random(12),
      ]);

      $user->assignRole($role);
   }
}
