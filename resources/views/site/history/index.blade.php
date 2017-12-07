@extends('layouts.master-site')

@section('title', '在庫履歴一覧')

@push('css-script')
    <link href="{{ asset('/assets/content/jquery-ui-1.10.4.css') }}" rel="stylesheet">
@endpush

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
                        'url' => '/history', 
                        'class' => 'form-horizontal')) !!}
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="row">
                                <!-- 品番 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">品番</label>
                                        <div class="col-md-9">
                                            {!! Form::tel('sHinban', Request::get('sHinban'), 
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
                                            {!! Form::tel('sChikouguhinban', Request::get('sChikouguhinban'), 
                                            array(
                                                'id' => 'sChikouguhinban',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- 開始日付 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">開始日付</label>
                                        <div class="col-md-9">
                                            {!! Form::tel('sStartDate', Request::get('sStartDate'), 
                                            array(
                                                'id' => 'sStartDate',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- 終了日付 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">終了日付</label>
                                        <div class="col-md-9">
                                            {!! Form::tel('sEndDate', Request::get('sEndDate'), 
                                            array(
                                                'id' => 'sEndDate',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- 状態 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">状態</label>
                                        <div class="col-md-9">
                                            {!! Form::select('sHinbanType', $hinban_types, Request::get('sHinbanType'), 
                                            array(
                                                'id' => 'sHinbanType',
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- 入出庫 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">入出庫</label>
                                        <div class="col-md-9">
                                            {!! Form::select('sType', $types, Request::get('sType'), 
                                            array(
                                                'id' => 'sType',
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="search" name="search" type="submit" class="btn btn-primary" value="検索" />
                                    <a class="btn btn-primary" href="/history">リセット</a>                                
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
                        <p class="panel-title">在庫履歴一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="lists table-responsive">
                            @include('site.history.list')
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

@push('js-script')
    <script src="{{ asset('/assets/scripts/jquery.ui.datepicker-ja.min.js') }}"></script>

    <script type="text/javascript">
        $("#sStartDate").datepicker();
        $("#sEndDate").datepicker();
    </script>
@endpush