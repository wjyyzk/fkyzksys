@extends('layouts.master-admin')

@section('title', '業者一覧')

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
                        'url' => '/admin/merchant/index', 
                        'class' => 'form-horizontal')) !!}
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- 業者 -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">業者</label>
                                        <div class="col-md-9">
                                            {!! Form::tel('sName', Request::get('sName'), 
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
                                    <button type="submit" name="search" class="btn btn-primary" value="search">検索</button>
                                    <a id="reset" class="btn btn-primary" href="/admin/merchant/index">リセット</a>
                                    <button type="submit" name="excel" class="btn btn-primary" value="excel">エクセル</button>                                    
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
                        <p class="panel-title">業者一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="lists table-responsive">
                            @include('admin.merchant.list')
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