<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x < 100;$x++){
            DB::table('posts')->insert([
                'title' => str_random(200),
                'sumary' => str_random(200),
                'text' => str_random(400),
                'category_id' => 1,
                'active' => true,
            ]);            
        }
    }
}
