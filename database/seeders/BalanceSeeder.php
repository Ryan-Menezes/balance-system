<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Balance;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::factory(1)->create();
    }
}
