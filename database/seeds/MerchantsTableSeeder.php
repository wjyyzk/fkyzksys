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
            'name'         =>  '弘洋',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '横浜テクニカ',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '矢崎イヒエ',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'モテック',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '松浦製作所',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '増田工業',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'フケン販売',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '深谷製作所',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'ファムテック',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '花澤製作所',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'ナカモク',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'イヌテク',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'MPA',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '大東機械',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'HIB専用機',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'ISJ',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'MKH',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '野中技研',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'NIM',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'OMP',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'SSN',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'TNS',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'TCS',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '植田部品',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '湖西機工',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '佐野',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  'WSZ',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '先生鉄工所',
        ]);

        DB::table('merchant')->insert([
            'name'         =>  '長野工業',
        ]);
    }
}
