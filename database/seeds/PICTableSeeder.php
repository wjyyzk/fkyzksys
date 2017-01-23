<?php

use Illuminate\Database\Seeder;

class PICTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pic')->insert([
            'name'			=>  '山下',
            'furigana'		=>  'ヤマシタ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '太田',
            'furigana'		=>  'オオタ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '大谷',
            'furigana'		=>  'オオタニ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '大石',
            'furigana'		=>  'オオイシ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '松村伸',
            'furigana'		=>  'マツムラノブ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '半田',
            'furigana'		=>  'ハンダ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '鶴',
            'furigana'		=>  'ツル',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '杉本',
            'furigana'		=>  'スギモト',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '花澤',
            'furigana'		=>  'ハナザワ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '興津',
            'furigana'		=>  'オキツ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '河原',
            'furigana'		=>  'カワハラ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '鎌田',
            'furigana'		=>  'カマダ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '野中',
            'furigana'		=>  'ノナカ',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '松村瞬',
            'furigana'		=>  'マツムラシュン',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '松本',
            'furigana'		=>  'マツモト',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '伊都',
            'furigana'		=>  'イト',
        ]);

        DB::table('pic')->insert([
            'name'			=>  '髙岡',
            'furigana'		=>  'タカオカ',
        ]);
    }
}
