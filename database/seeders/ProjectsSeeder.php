<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'nom' => 'Projecte 1',
                'descripcio' => 'blablabla',
                'data_ini' => '2026-05-17 22:06:27',
                'data_fi' => '2026-10-17 23:06:27',
                'user_id' => 1,
            ],
            [
                'nom' => 'Projecte 2',
                'descripcio' => 'blublublu',
                'data_ini' => '2026-05-17 22:06:27',
                'data_fi' => '2026-10-17 23:06:27',
                'user_id' => 1,
            ],
        ]);
    }
}
