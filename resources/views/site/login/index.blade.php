@extends('layouts.master-site')

@section('title', 'ログイン')

@section('content')

<section id="main-content">

	<section class="wrapper">

		<!--　ログイン -->
		{!! Form::open(array('url' => 'login', 'class' => 'form-panel')) !!}
		{{ csrf_field() }}

		    <input type="text" id="user" name="user" class="form-control" placeholder="ユーザー ID" autofocus>
		    <br />
		    <input type="password" id="password" name="password" class="form-control" placeholder="パスワード">
		    <label class="checkbox">
		        <span class="pull-right">
		            <a data-toggle="modal" href="login.html#myModal"> パスワードを忘れた方へ</a>
		        </span>
		    </label>
		    <button class="btn btn-theme btn-block" href="index.html" type="submit">
		    	<i class="fa fa-lock"></i>ログイン
		    </button>

		{!! Form::close() !!}
		<!--　./ログイン -->

	</section>

</section>

@endsection