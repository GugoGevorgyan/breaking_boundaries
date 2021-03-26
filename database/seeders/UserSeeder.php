<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array (
            0 =>
                [
                    'email' => 'superadmin@gmail.com',
                    'name' => 'SuperAdmin',
                    'age' => 25,
                    'phone' => 1875878878,
                    'status' => true,
                    'role_id' => 1,
                    'password' => Hash::make('1111'),
                    'email_verified_at' => now(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
        ));
    }
}
