<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->delete();

        Game::factory()
            ->count(8)
            ->hasAttached(Team::factory()->count(2)
                ->hasAttached(User::factory()->count(8),
//                    [
//                        'created_at' => date('Y-m-d H:i:s'),
//                        'updated_at' => date('Y-m-d H:i:s')
//                    ]
                ),
//                [
//                    'created_at' => date('Y-m-d H:i:s'),
//                    'updated_at' => date('Y-m-d H:i:s')
//                ]
            )
            ->create();
    }
}
