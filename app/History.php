<?php

namespace App;

use Request;
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

		//	【検索】種類によって入庫データを取得する
		if (!Request::has('sType') || Request::get('sType') == 1)
			$storageIn = StorageIn::whereHas('storage', function($q) {
				if(Request::has('sHinban'))
					$q->where('hinban', 'like', '%'.Request::get('sHinban').'%');
				if(Request::has('sChikouguhinban'))
					$q->where('chikouguhinban', 'like', '%'.Request::get('sChikouguhinban').'%');
			})->with('storage')
			->select('id', 'storage_id', DB::raw("'1' as type"), 'date', 'time', 'stock');
		else
			$storageIn = null;
		
		//	【検索】種類によって出庫データを取得する
		if (!Request::has('sType') || Request::get('sType') == 2)
			$storageOut = StorageOut::whereHas('storage', function($q) {
				if(Request::has('sHinban'))
					$q->where('hinban', 'like', '%'.Request::get('sHinban').'%');
				if(Request::has('sChikouguhinban'))
					$q->where('chikouguhinban', 'like', '%'.Request::get('sChikouguhinban').'%');			
			})->with('storage')
			->select('id', 'storage_id', DB::raw("'2' as type"), 'date', 'time', 'stock');
		else
			$storageOut = null;

		//	入庫と出庫のデータをマージする
		$combine = $storageIn->union($storageOut)
					->orderBy('date', 'DESC')
					->orderBy('time', 'DESC')
					->get()->toArray();

		$slice = array_slice($combine, $paginate * ($page - 1), $paginate);
		$result = new LengthAwarePaginator($slice, count($combine), $paginate);

		//	モデルを作成
		return $result;
	}
}
