@extends('layouts.master-site')

@section('title', '入庫')

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
				@if(Session::has('warning'))
				    <div class="alert alert-danger alert-dismissable">
				        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				        <label class="control-label">{{ Session::get('warning') }}</label>
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
                        <p class="panel-title">入庫入力フォーム</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
        						{!! Form::open(array(
									'method' => 'POST',
                                    'class' => 'form-horizontal',
									'route' => 'admin.user.store')) !!}

                                    <!-- ID -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">ID</label>
                                        <div class="col-md-10">
                                            {!! Form::text('id', null, 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'autofocus'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            {!! Form::text('hinban1', null,
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10">
                                            {!! Form::text('hinban2', null,
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 在庫数 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">在庫数</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('stock_curr', null,
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 入庫数 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">入庫数</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('stock', null,
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="登録" />
                                    <button type="reset" class="btn btn-primary">リセット</button>
                                    
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