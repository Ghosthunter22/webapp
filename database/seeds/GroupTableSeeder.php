<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g = new Group;
        $g->title = "Computer Science";
        $g->save();
        $g->users()->attach(1);
        $g->users()->attach(2);
        $g->users()->attach(3);
        $g->users()->attach(4);
        $g->users()->attach(5);
        $g->users()->attach(6);
        $g->users()->attach(7);
        $g->users()->attach(8);
    }
}
