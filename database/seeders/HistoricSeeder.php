<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historic;

class HistoricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Historic::factory(100)->create();
    }
}
