<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();

        $u = new User;
        $u->name = "Postr Admin";
        $u->email = "admin@postr.com";
        $u->password = Hash::make("123456789");
        $u->save();
        
        $tu = new User;
        $tu->name = "Test User";
        $tu->email = "test@postr.com";
        $tu->password = Hash::make("123456789");
        $tu->save();
    }
}
