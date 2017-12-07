@extends('layouts.master-admin')

@section('title', '担当者一覧')

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
            </div>
        </div>
        <!-- /.row -->

        <!-- 検索条件 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">検索</p>
                    </div>

                    {!! Form::open(array(
                        'method' => 'GET',
                        'url' => '/admin/pic/index', 
                        'class' => 'form-horizontal')) !!}

                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="row">
                                <!-- ユーザー名 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">担当者</label>
                                        <div class="col-md-9">
                                            {!! Form::text('sName', Request::get('sName'), 
                                            array(
                                                'id' => 'sName',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary" value="検索" />
                                    <a id="reset" class="btn btn-primary" href="/admin/pic/index">リセット</a>                                        
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    {!! Form::close() !!}

                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- テーブル -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">担当者一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="lists table-responsive">
                            @include('admin.pic.list')
                        </div>
                        <!-- /.table-responsive -->
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