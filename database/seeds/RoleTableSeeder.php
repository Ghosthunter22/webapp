<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Role;
        $user->name = "user";
        $user->save();

        $users = User::all();
        foreach($users as $currentuser){
            $user = Role::findOrFail(1);
            $user_id = $currentuser->id;
            $user->users()->attach($user_id);
        }
        

        $admin = new Role;
        $admin->name = "admin";
        $admin->save();

        $admin->users()->attach(101);
    }
}
