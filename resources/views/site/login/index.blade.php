@extends('layouts.master-site')

@section('title', 'ログイン')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">サインイン</h3>
                </div>
                <div class="panel-body">
					<!--　ログイン -->
					{!! Form::open(array('url' => 'login', 'class' => 'form-panel')) !!}
					{{ csrf_field() }}

                        <fieldset>

                            <div class="form-group">
                                <input class="form-control" placeholder="ユーザー" name="user" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="パスワード" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">ログイン</button>

                        </fieldset>

					{!! Form::close() !!}
					<!--　./ログイン -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection