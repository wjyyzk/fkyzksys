@extends('layouts.master-site')

@section('title', 'ログイン')

@section('content')

<div id="page-wrapper">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ログイン</h3>
                </div>
                <div class="panel-body">

                    @if(Session::has('message'))
                    <!-- メッセージ -->
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <label class="control-label">{{ Session::get('message') }}</label>
                    </div>
                    @endif
                
					<!--　ログイン -->
					{!! Form::open(array('url' => 'login', 'class' => 'form-panel')) !!}
					{{ csrf_field() }}

                        <fieldset>

                            <div class="form-group">
                                {!! Form::tel('username', null, 
                                array(
                                    'required',
                                    'class' => 'form-control hankaku',
                                    'placeholder' => 'ユーザー',
                                    'autocomplete' => 'off',
                                    'autofocus'
                                )) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', 
                                array(
                                    'required',
                                    'class' => 'form-control hankaku',
                                    'placeholder' => 'パスワード',
                                    'autocomplete' => 'off',
                                    'autofocus'
                                )) !!}
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