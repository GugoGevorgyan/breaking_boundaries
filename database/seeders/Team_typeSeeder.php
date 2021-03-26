<?php

namespace Database\Seeders;

use App\Models\Team_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Team_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_types')->delete();
        $team_types = [
            [
                'name' => '5-7',
                'criteria' => '5-7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => '8-9',
                'criteria' => '8-9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '10-12',
                'criteria' => '10-12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '13-14',
                'criteria' => '13-14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '17-18',
                'criteria' => '17-18',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '18-40',
                'criteria' => '18-40',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '40+',
                'criteria' => '40+',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        Team_type::insert($team_types);

    }
}
