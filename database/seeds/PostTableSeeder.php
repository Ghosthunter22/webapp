<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 50)->create();

        $p = new Post;
        $p->title = "My Post";
        $p->image = null;
        $p->post ="Generic Post";
        $p->user_id = 51;
        $p->created_at= "2019-11-11 11:42:29";
        $p->updated_at= "2019-11-11 11:42:29";
        $p->save();
    }
}
