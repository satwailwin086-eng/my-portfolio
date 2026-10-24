<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            [
                'name' => 'HTML',
                'category' => 'Frontend',
                'description' => 'Website Structure',
            ],
            [
                'name' => 'CSS',
                'category' => 'Frontend',
                'description' => 'Styling & Layout',
            ],
            [
                'name' => 'JavaScript',
                'category' => 'Frontend',
                'description' => 'Interactive Features',
            ],
            [
                'name' => 'PHP',
                'category' => 'Backend',
                'description' => 'Backend Programming',
            ],
            [
                'name' => 'Laravel',
                'category' => 'Backend',
                'description' => 'PHP Web Framework',
            ],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(
                ['name' => $skill['name']],
                [
                    'category' => $skill['category'],
                    'description' => $skill['description'],
                ]
            );
        }
    }
}