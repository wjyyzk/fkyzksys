@extends('layouts.master-admin')

@section('title', 'データ更新')

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
                        在庫データ更新
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12">

                            {!! Form::open(array(
                                'method' => 'POST',
                                'url' => '/admin/stock/index', 
                                'class' => 'form-horizontal')) !!}

                                <!-- ファイル1 -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label">入庫データ</label>
                                    <div class="col-md-10">
                                        {!! Form::file('storage_log', array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <!-- ファイル2 -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label">出庫データ</label>
                                    <div class="col-md-10">
                                        {!! Form::file('retrieval_log', array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="インポート開始" />

                            {!! Form::close() !!}

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