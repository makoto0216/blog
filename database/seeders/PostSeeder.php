<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
                'title' => 'title1',
                'body' => 'This is body.',
                'category_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'image' =>  'a'
            ]);
    }
}
