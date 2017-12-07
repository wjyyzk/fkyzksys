<?php

use Illuminate\Database\Seeder;

use App\Models\Storage;
use App\Models\Merchant;
use App\Models\PIC;

class ImportTableSeeder extends Seeder
{
    //  エンコードの変換
    private function convertJpnChar($data)
    {
        return mb_convert_encoding($data, "UTF-8", 'sjis-win');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  30フィールドまで可能
        foreach (file(public_path()."/upload/import.txt") as $row) {
            $row = mb_convert_encoding($row, "UTF-8", 'sjis-win');

            $row = explode("\t", $row);

            $input = array(
                'hinban'            =>  $row[0],                //  品番
                'seppenfugou'       =>  $row[1],                //  設変符号
                'name'              =>  $row[2],                //  品名
                'af'                =>  $row[3] ? 1 : 0,        //  A/F
                'cf'                =>  $row[4] ? 1 : 0,        //  C/F
                'other'             =>  $row[5] ? 1 : 0,        //  その他
                'chikouguhinban'    =>  $row[6],                //  治工具品番
                'zuuban'            =>  $row[7],                //  図番
                'unit_price'        =>  $row[9],                //  単価
                'shashu'            =>  $row[10],               //  車種
                'bui'               =>  $row[11],               //  部位
                'lock'              =>  $row[12],               //  ロック方向
                'comment'           =>  $row[13]                //  備考
            );

            //  確認処理
            if (empty($input['hinban']))
                continue;

            if (!empty($input['chikouguhinban']))
            {
                $model = Storage::where('chikouguhinban', $input['chikouguhinban'])->first();
                if($model)
                    continue;                
            }

            $model = Storage::where('hinban', $input['hinban'])->first();
            if($model)
                continue;
                
            //  業者
            $gyousha = Merchant::where('name', $row[8])->first();
            if($gyousha)
                $input['gyousha'] = $gyousha->id;
            else
                $input['gyousha'] = 0;

            //  担当者
            $pic = PIC::where('name', trim(preg_replace('/\s+/', ' ', $row[14])))->first();
            if($pic)
                $input['pic'] = $pic->id;
            else
                $input['pic'] = 0;

            //  在庫リストデータを追加する
            $model = Storage::create($input);
        }
    }
}
