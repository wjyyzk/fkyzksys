@extends('layouts.master-admin')

@section('title', 'ユーザー編集')

@section('content')

    <div id="page-wrapper">

        <!-- メッセージ -->
        <div class="row">
        	<div class="col-lg-12">
        		<br />
		        @if(Session::has('message'))
		            <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <label class="control-label">{{ Session::get('message') }}</label>
		            </div>
		        @endif
                @if(count($errors) > 0)                
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $error)
                        <label class="control-label">{{ $error }}</label>
                        @endforeach
                    </div>
                @endif
	       	</div>
        </div>
        <!-- /.row -->

        <!-- フォーム -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">ユーザーデータ</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
        						{!! Form::open(array(
									'method' => 'PUT',
                                    'class' => 'form-horizontal',
									'route' => ['admin.user.update', $model->id])) !!}

                                    <!-- ユーザー名 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">ユーザー</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('username', $model->username, 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '20',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- パスワード -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">パスワード</label>
                                        <div class="col-md-10">
                                            {!! Form::password('password', 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- パスワード確認 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">パスワード確認</label>
                                        <div class="col-md-10">
                                            {!! Form::password('password_conf', 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="登録" />
                                    <button type="reset" class="btn btn-primary">リセット</button>
                                    <button type="button" class="btn btn-primary" onclick="return history.back()">戻る</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

@endsection

@push('js-script')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Admin\UserRequest') !!}

@endpush