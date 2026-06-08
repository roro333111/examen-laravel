<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'olga',
                'email' => 'olga@olga',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'artur',
                'email' => 'artur@artur',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'anderson',
                'email' => 'anderson@anderson',
                'password' => bcrypt('1234'),
            ],
            [
                'name' => 'hatim',
                'email' => 'hatim@hatim',
                'password' => bcrypt('1234'),
            ],
        ]);
    }
}
