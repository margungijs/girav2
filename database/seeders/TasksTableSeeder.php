<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    public function run(): void
    {
        $projectIds = range(1, 12); // Assuming you have 12 project_id's

        foreach ($projectIds as $projectId) {
            $taskCount = rand(3, 6); // Generate a random number of tasks for each project

            for ($i = 1; $i <= $taskCount; $i++) {
                DB::table('tasks')->insert([
                    'projectId' => $projectId,
                    'title' => "Task $i",
                    'description' => "Description for Task $i.",
                    'dueDate' => now()->addDays(rand(1, 30))->toDateString(), // Random due date within the next 30 days
                    'role' => 'programmer', // You can modify this based on your requirements
                    'userId' => rand(1, 10), // Assuming you have 10 user_id's
                    'status' => $this->getRandomStatus(),
                ]);
            }
        }
    }

    private function getRandomStatus(): string
    {
        $statuses = ['To Do', 'In Progress', 'Stuck', 'Done'];

        return $statuses[array_rand($statuses)];
    }
}
