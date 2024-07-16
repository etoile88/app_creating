<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class Like_commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('like_comments')->insert([
            'user_id'=> $user_id,
            'comment_id'=> $comment_id,
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            ]);
    }
}
