<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = [
            '邦楽ロック','邦楽','K-POP','洋楽','邦楽ヒップホップホップ','ロック',
            'ボーカロイド・歌い手','アニメ','EDM','ダンス','R&B','ダンス','レゲエ',
            'ヒップホップ','歌謡曲・演歌','ジャズ','キッズ','クラシック','ワールドミュージック','その他'
            ];
        foreach ($genre as $name) {
                DB::table('categories')->insert(['name' => $name]);
        }
    }

}
