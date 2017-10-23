<?php

namespace App\Library;

use Maatwebsite\Excel\Facades\Excel;
use App\Storage;

/**
 *	エクセルに出力処理
 */
class ExportExcelLib
{
	private $models;

	//	コンストラクタ
	function __construct($models)
	{
		$this->models = $models;
	}

	/**
	 *	在庫リスト
	 */
	public function exportZaikoList()
	{
		$storage = new Storage();

		//	ヘーダー
		$exports = array(array(
			'金額合計',
			$storage->getTotalFee()
		));

		array_push($exports, array(
			'在庫数の総合計',
			$storage->getTotalCount()
		));

		//	データ
		array_push($exports, array(
			'品番',
			'設変符号',
			'設変履歴',
			'品名',
			'棚番',
			'A/F',
			'C/F',
			'その他',
			'治工具品番',
			'図番',
			'業者',
			'単価',
			'在庫数',
			'車種',
			'部位',
			'ロック方向',
			'備考',
			'担当',
			'振替単価',
			'部品図面',
			'予備',
			'更新日',
		));

		foreach ($this->models as $model) {
			//	設変履歴
			$model->history = null;
			foreach ($model->history_seppen as $history) {
				if ($model->history)
					$model->history = $model->history . ', ' . $history->comment;
				else
					$model->history = $history->comment;
			}

			array_push($exports, array(
				$model->hinban,
				$model->seppenfugou,
				$model->history,
				$model->name,
				$model->tanaban,
				$model->af,
				$model->cf,
				$model->other,
				$model->chikouguhinban,
				$model->zuuban,
				$model->gyousha ? $model->merchant->name : null,
				$model->unit_price,
				$model->stockIn - $model->stockOut,
				$model->shashu,
				$model->bui,
				$model->lock,
				$model->comment,
				$model->pic,
				$model->whq,
				$model->file1 ?	"http://157.7.137.246/upload/file1/".$model->file1 : null,
				$model->file2 ? "http://157.7.137.246/upload/file2/".$model->file2 : null,
				$model->updated_at
			));
		}

		Excel::create('fukaya_download', function($excel) use($exports) {
			$excel->sheet('在庫リスト', function($sheet) use($exports) {
				$sheet->fromArray($exports, null, 'A1', false, false);
			});
		})->export('xls');
	}

	/**
	 *	業者
	 */
	public function exportGyousha()
	{
		$exports = array(array(
			'業者'
		));

		foreach ($this->models as $model) {
			array_push($exports, array(
				$model->name
			));
		}

		Excel::create('fukaya_download', function($excel) use($exports) {
			$excel->sheet('業者', function($sheet) use($exports) {
				$sheet->fromArray($exports, null, 'A1', false, false);
			});
		})->export('xls');
	}
}