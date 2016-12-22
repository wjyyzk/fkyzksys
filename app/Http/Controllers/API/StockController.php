<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;

class StockController extends MasterAPI
{

    public function index($key, $id)
    {
    	if ($key != $this->api_key)
    		return response()->json([
    			'status'	=> false
    		]);

    	$value = 1;

    	return response()->json([
    			'status'	=> true,
    			'id'		=> $id,
    			'stock'		=> $value
    		]);
    }
}