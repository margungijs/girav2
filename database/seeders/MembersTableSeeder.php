<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Assuming you have user IDs and team IDs available
        $membersData = [
            ['team_id' => 1, 'user_id' => 1],
            ['team_id' => 1, 'user_id' => 2],
            ['team_id' => 1, 'user_id' => 3],
            // Add more members as needed
        ];

        DB::table('members')->insert($membersData);
    }
}
