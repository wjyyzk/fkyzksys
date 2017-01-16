<?php

namespace App;

use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 *  【モデル】業者
 */
class Merchant extends Model
{
	//  テーブル名
	protected $table = "merchant";

    //  TimeStamps無効にする
    public $timestamps = false;
        
	use SoftDeletes;

	/**
	 *	項目
	 *
	 *	@var array
	 */
	protected $fillable = [
		'name'
	];

    /**
     * The dates attributes 
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     *  検索
     *
     *  @return 業者 リスト
     */
    public function scopeFilter()
    {
        $models = Merchant::query();

        //  検索
        if(Request::has('sName'))
            $models->where('name', 'like', '%'.Request::get('sName').'%');
        
        $models = $models->orderBy('id', 'desc')->paginate(10);

        return $models;
    }
}
