<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            ['name' => 'Софийски университет "Св. Климент Охридски"', 'grade' => '9.5'],
            ['name' => 'Технически университет - София', 'grade' => '9.0'],
            ['name' => 'Пловдивски университет "Паисий Хилендарски"', 'grade' => '8.5'],
            ['name' => 'Нов български университет', 'grade' => '8.0'],
            ['name' => 'Университет за национално и световно стопанство', 'grade' => '8.5'],
            ['name' => 'Американски университет в България', 'grade' => '9.2'],
            ['name' => 'Технически университет - Варна', 'grade' => '8.0'],
            ['name' => 'Бургаски свободен университет', 'grade' => '7.5'],
            ['name' => 'Великотърновски университет "Св. св. Кирил и Методий"', 'grade' => '8.0'],
            ['name' => 'Икономически университет - Варна', 'grade' => '8.5'],
        ];

        foreach ($universities as $university) {
            DB::table('university')->insert([
                'name' => $university['name'],
                'grade' => $university['grade'],
            ]);
        }
    }
}
