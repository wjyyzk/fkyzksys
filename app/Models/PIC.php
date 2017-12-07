<?php

namespace App\Models;

use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 *	【モデル】担当者
 */
class PIC extends Model
{
	//  テーブル名
	protected $table = "pic";

    //  TimeStamps無効にする
    public $timestamps = false;
        
	use SoftDeletes;

	/**
	 *	項目
	 *
	 *	@var array
	 */
	protected $fillable = [
		'name',
        'furigana'
	];

    /**
     * The dates attributes 
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     *  在庫テーブルの関連
     */
    public function storage()
    {
        return $this->hasMany('App\Models\Storage', 'pic');
    }
    
    /**
     *  検索
     *
     *  @return 担当者 リスト
     */
    public function scopeFilter()
    {
        $models = PIC::query();

        //  検索
        if(Request::has('sName'))
            $models->where('name', 'like', '%'.Request::get('sName').'%');
        
        $models = $models->orderBy('furigana', 'asc')
                    ->orderBy('name', 'asc')
                    ->paginate(10);

        return $models;
    }
}
