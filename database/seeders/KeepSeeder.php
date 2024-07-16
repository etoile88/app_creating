<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class KeepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keeps')->insert([
            'user_id'=> $user_id,
            'post_id'=> $post_id,
            'name'=> 'Ryota',
            'created_at'=> new DateTime(),
            'updated_at'=> new DateTime(),
            'deleted_at'=> null,
            ]);
    }
}
