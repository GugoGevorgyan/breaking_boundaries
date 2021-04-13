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
                    [
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                ),
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            )
            ->create();
//        $game = new Game();
//        $game->league_id = 1;
//        $game->start_date = date('2021-05-28 18:30:00');
//        $game->end_date = date('2021-05-28 20:03:00');
//        $game->save();
//        $game->teams()->attach(2);
//        $game->teams()->attach(3);

//        $games = [
//            [
//                'league_id' => 1,
//                'date' => date('Y-m-d'),
//                'time' => date('H:i:s'),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],
//
//            [
//                'league_id' => 1,
//                'date' => date('Y-m-d'),
//                'time' => date('H:i:s'),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s'),
//            ],
//        ];
    }
}
