<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusIndicacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_indicacao')->insert([
            'descricao' => 'Iniciada',
        ]);

        DB::table('status_indicacao')->insert([
            'descricao' => 'Em processo',
        ]);

        DB::table('status_indicacao')->insert([
            'descricao' => 'Finalizada',
        ]);
    }
}
