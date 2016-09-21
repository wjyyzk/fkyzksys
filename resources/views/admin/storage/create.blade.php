@extends('layouts.master-admin')

@section('title', '在庫リスト作成')

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

        <!-- フォーム -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">在庫リストデータ</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
        						{!! Form::open(array(
									'method' => 'POST',
                                    'class' => 'form-horizontal',
									'route' => 'admin.storage.store')) !!}

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番1</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('hinban1', null, 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 検索品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">検索品番</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('search_hinban', null, 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 設変符号 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">設変符号</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('seppenfugou', null, 
                                            array(
                                                'required',
                                                'class' => 'form-control hankaku',
                                            )) !!}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">登録</button>
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