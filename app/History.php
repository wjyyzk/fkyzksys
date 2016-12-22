<?php

namespace App;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 *	【モデル】履歴
 */
class History extends Model
{
	/**
	 *	検索
	 *	@return 	array 	モデルの配列
	 */
	public function scopeFilter()
	{
		//  ページ番号を取得する
        $page = Input::get('page', 1);
        //	ページのデータ数
		$paginate = 10;

		//	入出庫データを取得する
		$stockIn = StorageIn::query();
		$stockOut = StorageOut::query();

		//	入庫と出庫のデータをマージする
		$combine = $stockIn->union($stockOut)->get()->toArray();

		$slice = array_slice($combine, $paginate * ($page - 1), $paginate);
		$result = new LengthAwarePaginator($slice, count($combine), $paginate);

		//	モデルを作成
		return $result;
	}
}
