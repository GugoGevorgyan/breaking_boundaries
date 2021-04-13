<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leagues')->delete();

        League::factory()
            ->count(6)
            ->create();
//        $league = [
//            [
//                'name' => 'Europa',
//                'year' => '2015',
//                'season_id' => 1,
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],
//
//            [
//                'name' => 'uefa',
//                'year' => '2015',
//                'season_id' => 2,
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],
//
//        ];
//        League::insert($league);

    }
}
