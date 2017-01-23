<?php

use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchant')->insert([
            'name'			=>  '弘洋',
            'furigana'		=>	'コウヨウ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '横浜テクニカ',
            'furigana'		=>	'ヨコハマテクニカ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '矢崎化工',
            'furigana'		=>	'ヤザキカコウ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'モテック',
            'furigana'		=>	'モテック'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '松浦製作所',
            'furigana'		=>	'マツウラセイサクショ' 
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '増田工業',
            'furigana'		=>	'マスダコウギョウ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'フケン販売',
            'furigana'		=>	'フケンハンバイ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '深谷製作所',
            'furigana'		=>	'フカヤセイサクショ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'ファムテック',
            'furigana'		=>	'ファムテック'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '花澤製作所',
            'furigana'		=>	'ハナザワセイサクショ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'ナカモク',
            'furigana'		=>	'ナカモク'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'エヌテック',
            'furigana'		=>	'エヌテック'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'MPA',
            'furigana'		=>	'MPA'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '大東機械',
            'furigana'		=>	'ダイトウキカイ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'HIB専用機',
            'furigana'		=>	'HIBセンヨウキ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'ISJ',
            'furigana'		=>	'ISJ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'MKH',
            'furigana'		=>	'MKH'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '野中技研',
            'furigana'		=>	'ノナカギケン'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'NIM',
            'furigana'		=>	'NIM'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'OMP',
            'furigana'		=>	'OMP'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'SSN',
            'furigana'		=>	'SSN'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'TNS',
            'furigana'		=>	'TNS'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'TCS',
            'furigana'		=>	'TCS'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '植田部品',
            'furigana'		=>	'ウエダブヒン'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '湖西機工',
            'furigana'		=>	'コサイキコウ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '佐野',
            'furigana'		=>	'サノ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  'WSZ',
            'furigana'		=>	'WSZ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '先生鉄工所',
            'furigana'		=>	'センセイテッコウジョ'
        ]);

        DB::table('merchant')->insert([
            'name'			=>  '長野工業',
            'furigana'		=>	'ナガノコウギョウ'
        ]);
    }
}
