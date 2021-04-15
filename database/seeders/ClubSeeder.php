<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->delete();

        Club::factory()
            ->count(10)
            ->create();
        }
}
