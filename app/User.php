<?php

namespace App;

use Request;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    //  テーブル名
    protected $table = 'users';
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     *  @return User List
     */
    public function scopeFilter()
    {
        $models = User::query();

        //  検索
        if(Request::has('sUsername'))
            $models->where('username', 'like', '%'.Request::get('sUsername').'%');
        
        $models = $models->orderBy('id', 'desc')->paginate(10);

        return $models;
    }    
}