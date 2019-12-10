<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 50)->create();

        $c = new Comment;
        $c->comment ="Generic Comment";
        $c->commented_at = "2019-11-11 11:42:29";
        $c->basic_user_id = 51;
        $c->post_id = 51;
        $c->created_at= "2019-11-11 11:42:29";
        $c->updated_at= "2019-11-11 11:42:29";
        $c->save();
    }
}
