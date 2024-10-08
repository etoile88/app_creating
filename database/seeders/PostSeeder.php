<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id'=> '1',
            'category_id'=> '1',
            'image_url'=> null,
            'body'=> 'こんにちは',
            'artist'=> 'Mrs.GEENAPPLE',
            'song' => 'ライラック',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=> '2',
            'category_id'=> '2',
            'image_url'=> null,
            'body'=> 'マジでかっこいい',
            'artist'=> 'ONE OK ROCK',
            'song'=> 'We are',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
        ]);
    }
}
