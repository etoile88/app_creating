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
            'image'=> null,
            'body'=> 'こんにちは',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=> '2',
            'category_id'=> '2',
            'image'=> null,
            'body'=> 'konnnitiha',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
        ]);
    }
}
