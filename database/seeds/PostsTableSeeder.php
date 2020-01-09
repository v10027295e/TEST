<?php

use Illuminate\Database\Seeder;
use App\User as UserEloquent;
use App\Type as TypeEloquent;
use App\Post as PostEloquent;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = factory(UserEloquent::class, 4)->create();
        $postTypes = factory(TypeEloquent::class, 10)->create();
        $posts = factory(PostEloquent::class, 50)->create()->each(function($post) use ($postTypes){
            $post->type = $postTypes[mt_rand(0, (count($postTypes)-1))]->id;
            $post->save();
        });
    }
}
