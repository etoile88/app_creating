<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'post_id'=> '1',
            'user_id'=> '1',
            'body'=>'こんにちは1',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
        ]);
        
        DB::table('comments')->insert([
            'post_id'=> '1',
            'user_id'=> '2',
            'body'=>'こんにちは2',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
        ]);
        
        DB::table('comments')->insert([
            'post_id'=> '2',
            'user_id'=> '1',
            'body'=>'こんにちは3',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
        ]);
        
        DB::table('comments')->insert([
            'post_id'=> '2',
            'user_id'=> '2',
            'body'=>'こんにちは4',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
        ]);
    }
}
