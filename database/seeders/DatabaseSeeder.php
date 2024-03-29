<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $mgmg = User::factory()->create(['username' => 'Mg Mg']);
        $agag = User::factory()->create(['username' => 'Ag Ag']);

        $frontend = Category::factory()->create(['name' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend']);

        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$agag->id]);

        Comment::factory()->create(['user_id'=>$mgmg->id,'blog_id'=>1]);
        Comment::factory()->create(['user_id'=>$agag->id,'blog_id'=>3]);
    }
}
