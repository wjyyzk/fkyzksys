<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Storage;

/**
 *  【テスト】在庫リスト
 */
class AdminStorageTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  【管理画面】在庫リスト
        $this->visit('/admin/storage/index')
            ->seePageIs('/login');

        //	ログイン
        $this->getUser();

        //  在庫リスト
        $this->visit('/admin/storage/index')
            ->seePageIs('/admin/storage/index');

        $this->visit('/admin/storage/create')
            ->seePageIs('/admin/storage/create');
    }

    /**
     * 在庫リストの登録ﾃｽﾄ
     *
     * @return void
     */
    public function testNewStorage()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $gyousha = factory(App\Models\Merchant::class)->create();
        $pic = factory(App\Models\PIC::class)->create();

        $mockdata = array(
            'hinban'            =>  str_random(10),
            'chikouguhinban'    =>  str_random(10),
            'seppenfugou'       =>  str_random(2),
            'name'              =>  str_random(10),
            'af'                =>  TRUE,
            'cf'                =>  TRUE,
            'other'             =>  TRUE,
            'zuuban'            =>  str_random(10),
            'gyousha'           =>  $gyousha->id,
            'unit_price'        =>  100,
            'shashu'            =>  str_random(5),
            'bui'               =>  str_random(2),
            'lock'              =>  str_random(10),
            'comment'           =>  str_random(20),
            'pic'               =>  $pic->id,
            'tanaban'           =>  str_random(2)
        );

        $this->visit('/admin/storage/create')
            ->type($mockdata['hinban'], 'hinban')
            ->type($mockdata['chikouguhinban'], 'chikouguhinban')
            ->type($mockdata['seppenfugou'], 'seppenfugou')
            ->type($mockdata['name'], 'name')
            ->select($mockdata['af'], 'af')
            ->select($mockdata['cf'], 'cf')
            ->select($mockdata['other'], 'other')
            ->type($mockdata['zuuban'], 'zuuban')
            ->select($mockdata['gyousha'], 'gyousha')
            ->type($mockdata['unit_price'], 'unit_price')
            ->type($mockdata['shashu'], 'shashu')
            ->type($mockdata['bui'], 'bui')
            ->type($mockdata['lock'], 'lock')
            ->type($mockdata['comment'], 'comment')
            ->select($mockdata['pic'], 'pic')
            ->type($mockdata['tanaban'], 'tanaban')
            ->press('登録')
            ->seePageIs('/admin/storage/index')
            ->see('データを作成しました。');

        $model = Storage::where('hinban', $mockdata['hinban'])->first();
        if($model)
        {
            //  治工具品番
            $this->assertEquals($model->chikouguhinban, $mockdata['chikouguhinban']);
            //  設変符号
            $this->assertEquals($model->seppenfugou, $mockdata['seppenfugou']);
            //  名前
            $this->assertEquals($model->name, $mockdata['name']);
            //  A/F
            $this->assertEquals($model->af, $mockdata['af']);
            //  C/F
            $this->assertEquals($model->cf, $mockdata['cf']);
            //  その他
            $this->assertEquals($model->other, $mockdata['other']);
            //  図番
            $this->assertEquals($model->zuuban, $mockdata['zuuban']);
            //  業者
            $this->assertEquals($model->gyousha, $mockdata['gyousha']);
            //  単価
            $this->assertEquals($model->unit_price, $mockdata['unit_price']);
            //  車種
            $this->assertEquals($model->shashu, $mockdata['shashu']);
            //  部位
            $this->assertEquals($model->bui, $mockdata['bui']);
            //  ロック方向
            $this->assertEquals($model->lock, $mockdata['lock']);
            //  備考
            $this->assertEquals($model->comment, $mockdata['comment']);
            //  担当
            $this->assertEquals($model->pic, $mockdata['pic']);
            //  棚番
            $this->assertEquals($model->tanaban, $mockdata['tanaban']);
        }
        else
            $this->assertTrue(false);
    }

    /**
     * 在庫リストの検索テスト
     *
     * @return void
     */
    public function testSearchStorage()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $model = factory(Storage::class)->create();

        //  品番
        $this->visit('/admin/storage/index')
            ->type($model->hinban, 'sHinban')
            ->press('検索')
            ->see($model->chikouguhinban);

        //  治工具品番
        $this->visit('/admin/storage/index')
            ->type($model->chikouguhinban, 'sChikouguhinban')
            ->press('検索')
            ->see($model->hinban);

        //  品名
        $this->visit('/admin/storage/index')
            ->type($model->name, 'sName')
            ->press('検索')
            ->see($model->hinban);

        //  業者
        $this->visit('/admin/storage/index')
            ->type($model->gyousha, 'sGyousha')
            ->press('検索')
            ->see($model->hinban);

        //  車種
        $this->visit('/admin/storage/index')
            ->type($model->shashu, 'sShashu')
            ->press('検索')
            ->see($model->hinban);


        //  リセット
        $this->visit('/admin/storage/index')
            ->click("#reset")
            ->seePageIs('/admin/storage/index');
    }

    /**
     * 在庫リストの更新テスト
     *
     * @return void
     */
    public function testUpdateStorage()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $model = factory(Storage::class)->create();

        $mockdata = str_random(10);

        //  データを更新する
        $this->visit('/admin/storage/'.$model->id.'/edit')
            ->type($mockdata, 'chikouguhinban')
            ->press('登録');

        $this->seeInDatabase('storage', ['chikouguhinban' => $mockdata]);
    }

    /**
     * 在庫リストの削除テスト
     *
     * @return void
     */
    public function testDeleteStorage()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        factory(Storage::class)->create();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/storage/index')
            ->press('削除')
            ->seePageIs('/admin/storage/index')
            ->see('データを削除しました。');
    }
}
