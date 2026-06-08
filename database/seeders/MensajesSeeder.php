<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mensajes')->insert([
            [
                'asunto' => 'Hola',
                'mensaje' => 'BonDia anderson',
                'leido' => false,
                'destinatario_id' => '2',
                'remitente_id' => '1',
            ],
            [
                'asunto' => 'Hola',
                'mensaje' => 'BonDia artur',
                'leido' => false,
                'destinatario_id' => '1',
                'remitente_id' => '2',
            ],
        ]);
    }
}
