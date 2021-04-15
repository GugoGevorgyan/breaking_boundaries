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
    }
}
