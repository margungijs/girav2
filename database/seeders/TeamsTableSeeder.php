<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    public function run(): void
    {
        $teamsData = [
            ['team_name' => 'Team 1'],
            ['team_name' => 'Team 2'],
            ['team_name' => 'Team 3'],
            ['team_name' => 'Team 4'],
            ['team_name' => 'Team 5'],
        ];

        DB::table('teams')->insert($teamsData);
    }
}
