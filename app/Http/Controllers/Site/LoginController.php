<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Auth;
use Request;

//  バリデータ
use App\Http\Requests;

//  データベース
use App\User;

/*
 *  【コントローラ】ログイン
 */
class LoginController extends MasterSite
{
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

	//	GET
    public function getIndex()
    {
        if(Auth::user())
            return redirect('/admin/storage/index');

        return view('site/login/index');
    }

    /*
     *	POST
	 *	@param request
	 *	@return view
	 */
	public function postIndex()
    {
        $user = array(
            'username'  =>  Request::get('username'),
            'password'  =>  Request::get('password'),
        );

        //  ログイン確認
        if (Auth::attempt($user)) {
            return redirect()->intended('/admin/storage/index');
        }

        //  メッセージ
        \Session::flash('message', 'ログインに失敗しました。');

        return redirect('/login');
    }
}
