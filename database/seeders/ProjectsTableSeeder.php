<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'team_id' => 1,
                'projectName' => 'Website Redesign',
                'description' => 'Revamp the user interface and enhance the overall user experience for our company website.',
                'creationDate' => '2023-01-10',
                'creator' => 'Alice Johnson',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Mobile App Development',
                'description' => 'Create a new mobile application to extend our services to iOS and Android users.',
                'creationDate' => '2023-02-15',
                'creator' => 'Bob Smith',
            ],
            [
                'team_id' => 1,
                'projectName' => 'E-commerce Platform Upgrade',
                'description' => 'Upgrade the existing e-commerce platform to improve performance, security, and add new features.',
                'creationDate' => '2023-03-20',
                'creator' => 'Charlie Brown',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Project Management Tool',
                'description' => 'Develop a project management tool to streamline collaboration and task tracking within the team.',
                'creationDate' => '2023-04-25',
                'creator' => 'David Miller',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Customer Feedback System',
                'description' => 'Build a system to collect and analyze customer feedback to enhance our products and services.',
                'creationDate' => '2023-05-05',
                'creator' => 'Eva Rodriguez',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Internal Knowledge Base',
                'description' => 'Create a centralized knowledge base for employees to access important information and resources.',
                'creationDate' => '2023-06-12',
                'creator' => 'Frank Davis',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Event Planning Platform',
                'description' => 'Develop a platform to facilitate the planning and management of corporate events and conferences.',
                'creationDate' => '2023-07-18',
                'creator' => 'Grace Anderson',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Health and Wellness App',
                'description' => 'Build a mobile app focused on promoting health and wellness through personalized plans and tips.',
                'creationDate' => '2023-08-22',
                'creator' => 'Henry White',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Employee Onboarding System',
                'description' => 'Create a system to streamline the onboarding process for new employees, providing a smooth transition.',
                'creationDate' => '2023-09-30',
                'creator' => 'Ivy Taylor',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Community Engagement Platform',
                'description' => 'Develop an online platform to foster community engagement and collaboration among users.',
                'creationDate' => '2023-10-10',
                'creator' => 'Jack Robinson',
            ],
            [
                'team_id' => 1,
                'projectName' => 'Data Analytics Dashboard',
                'description' => 'Build a dashboard for analyzing and visualizing key data metrics to inform business decisions.',
                'creationDate' => '2023-11-15',
                'creator' => 'Karen Wilson',
            ],
            [
                'team_id' => 1,
                'projectName' => 'AI Chatbot Integration',
                'description' => 'Integrate an AI-powered chatbot to enhance customer support and automate common inquiries.',
                'creationDate' => '2023-12-20',
                'creator' => 'Leo Garcia',
            ],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert($project);
        }
    }
}
