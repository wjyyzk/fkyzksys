@extends('layouts.master-admin')

@section('title', 'ユーザー作成')

@section('content')

	<section id="main-content">
		<section class="wrapper">

			<div class="row mt">
				<div class="col-lg-12">
					<div class="form-panel">
						<h4 class="mb">ユーザー作成</h4>
						<!-- フォーム -->
						{!! Form::open(array(
							'method' => 'post',
							'url' => '/admin/user', 
							'class' => 'form-horizontal tasi-form')) 
						!!}
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">ユーザー</label>
								<div class="col-sm-10">
									{!! Form::text('user', null, 
									array(
										'required',
										'class' => 'form-control',
										'autocomplete' => 'off'
									)) !!}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">パスワード</label>
								<div class="col-sm-10">
									{!! Form::text('password', null, 
									array(
										'required',
										'class' => 'form-control',
										'autocomplete' => 'off'
									)) !!}
									@if($errors->has('inputDate'))
										<span class="help-block">{{$errors->first('inputDate')}}</span>
									@endif
								</div>
							</div>
							{!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
						{!! Form::close() !!}
						<!-- /フォーム -->
					</div>
				</div><!-- col-lg-12-->
			</div><!-- /row -->

		</section><!--/wrapper -->
	</section><!-- /MAIN CONTENT -->

@endsection