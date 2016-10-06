<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class StockController extends MasterAdmin
{
	//	【画面】表示　
    public function index()
    {
    	return view('admin/stock/index');
    }

    //	【POST】データ更新
    public function update()
    {
    	return redirect('/admin/stock/index');
    }
}
