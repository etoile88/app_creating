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
            'usser_id'=> $user_id,
            'category_id'=> $category_id,
            'image'=> null,
            'body'=> 'こんにちは',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
            ]);
    }
}
