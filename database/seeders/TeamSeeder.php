<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->delete();

        Team::factory()
            ->count(10)
            ->create();

//            $teams = [
//                [
//                    'name' => 'Hoosiers',
//                    'club_id' => 1,
//                    'type_id' => 4,
//                    'city_id' => 2,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//
//                [
//                    'name' => 'Seminoles',
//                    'club_id' => 1,
//                    'type_id' => 4,
//                    'city_id' => 2,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//                [
//                    'name' => 'Flight Time',
//                    'club_id' => 2,
//                    'type_id' => 2,
//                    'city_id' => 3,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//                [
//                    'name' => 'Cream',
//                    'club_id' => 2,
//                    'type_id' => 5,
//                    'city_id' => 3,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//
//                [
//                    'name' => 'The Crossovers',
//                    'club_id' => 2,
//                    'type_id' => 6,
//                    'city_id' => 4,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//                [
//                    'name' => 'Dip and Dazzle',
//                    'club_id' => 2,
//                    'type_id' => 7,
//                    'city_id' => 1,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//                [
//                    'name' => 'Gothams',
//                    'club_id' => 1,
//                    'type_id' => 7,
//                    'city_id' => 1,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//
//                [
//                    'name' => 'The Wingfoots',
//                    'club_id' => 3,
//                    'type_id' => 6,
//                    'city_id' => 4,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//                [
//                    'name' => 'The All-Americans',
//                    'club_id' => 3,
//                    'type_id' => 2,
//                    'city_id' => 3,
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s'),
//                ],
//            ];
//            Team::insert($teams);

        }

}
