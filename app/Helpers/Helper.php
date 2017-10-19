<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class Helper
{
	/**	
	 *	class active
	 *	@param url
	 */
	public static function set_active($uri)
	{
	    return Request::is($uri) ? 'class="active"' : '';
	}
}