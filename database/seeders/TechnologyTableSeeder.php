<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['name' => 'PHP'],
            ['name' => 'C#'],
            ['name' => 'JavaScript'],
            ['name' => 'Python'],
            ['name' => 'Java'],
            ['name' => 'Ruby'],
            ['name' => 'Swift'],
            ['name' => 'Kotlin'],
            ['name' => 'Go'],
            ['name' => 'Rust'],
        ];

        DB::table('technology')->insert($technologies);
    }
}
