<?php

use App\BasicUser;
use Illuminate\Database\Seeder;

class BasicUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BasicUser::class, 50)->create();

        $b = new BasicUser;
        $b->username ="genericUsername";
        $b->name = "Generic Name";
        $b->email = "generic@email.com";
        $b->password = "gEnErIcPaSsWoRd";
        $b->created_at= "2019-11-11 11:42:29";
        $b->updated_at= "2019-11-11 11:42:29";
        $b->save();
    }
}
