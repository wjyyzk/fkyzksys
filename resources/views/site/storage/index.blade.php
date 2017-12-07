@extends('layouts.master-site')

@section('title', '在庫リスト一覧')

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
                        'url' => '/storage/index',
                        'class' => 'form-horizontal')) !!}

                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="row">
                                <!-- 品番 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">品番</label>
                                        <div class="col-md-9">
                                            {!! Form::text('sHinban', Request::get('sHinban'),
                                            array(
                                                'id' => 'sHinban',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- 治工具品番 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">治工具品番</label>
                                        <div class="col-md-9">
                                            {!! Form::text('sChikouguhinban', Request::get('sChikouguhinban'),
                                            array(
                                                'id' => 'sChikouguhinban',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="advance_search" class="panel-collapse collapse">
                                <div class="row">
                                    <!-- 業者 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">業者</label>
                                            <div class="col-md-9">
                                                {!! Form::select('sGyousha', $m_merchants, Request::get('sGyousha'),
                                                array(
                                                    'id' => 'sGyousha',
                                                    'class' => 'form-control',
                                                )) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 並び順 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">並び順</label>
                                            <div class="col-md-9">
                                                {!! Form::select('sOrder', $m_orders, Request::get('sOrder'),
                                                array(
                                                    'id' => 'sOrder',
                                                    'class' => 'form-control',
                                                )) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- A/F -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">A/F</label>
                                            <div class="col-md-9">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('sAF', 'af', Request::get('sAF')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- C/F -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">C/F</label>
                                            <div class="col-md-9">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('sCF', 'cf', Request::get('sCF')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- その他 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">その他</label>
                                            <div class="col-md-9">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('sOther', 'other', Request::get('sOther')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button id="search" name="search" type="submit" class="btn btn-primary" value="search">検索</button>
                                    <a id="reset" class="btn btn-primary" href="/storage/index">リセット</a>
                                    <a href="#" class="btn btn-primary" data-toggle="collapse" data-target="#advance_search">詳細設定</a>
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
                        <p class="panel-title">在庫リスト一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="lists table-responsive">
                            @include('site.storage.list')
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