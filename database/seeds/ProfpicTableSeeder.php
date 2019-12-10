<?php

use App\Profpic;
use Illuminate\Database\Seeder;

class ProfpicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profpic::class, 50)->create();
    }
}
