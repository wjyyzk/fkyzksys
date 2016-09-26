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

                {!! Form::open(array(
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'route' => 'admin.storage.store')) !!}

                    <div class="panel panel-default">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills panel-heading">
                            <li class="active">
                                <a href="#1" data-toggle="tab">在庫リストデータ1</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">在庫リストデータ2</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <!-- 在庫リスト1 -->
                            <div class="panel-body tab-pane fade in active" id="1">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <!-- 品番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">品番</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('hinban', null, 
                                                array(
                                                    'required',
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 設変符号 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">設変符号</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('seppenfugou', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- A/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">A/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('af', '1', Request::get('af')) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- C/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">C/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('cf', '1', Request::get('cf')) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- その他 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">その他</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('other', '1', Request::get('other')) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 治工具品番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">治工具品番</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('chikouguhinban', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 図番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">図番</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('zuuban', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 業者 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">業者</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('gyousha', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 単価 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">単価</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('unit_price', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 在庫数 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">在庫数</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('stock', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 中古品 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">中古品</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('stock_secondhand', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->

                            <!-- 在庫リスト2 -->
                            <div class="panel-body tab-pane fade" id="2">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <!-- 車種 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">車種</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('shashu', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 部位 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">部位</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('bui', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- ロック方向 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ロック方向</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('lock', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 備考 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">備考</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('comment', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 担当 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">担当</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('pic', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- WHO単価報告 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">WHO単価報告</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('who', null, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->

                        </div>

                    </div>
                    <!-- /.panel -->

                    <button type="submit" class="btn btn-primary">登録</button>
                    <button type="reset" class="btn btn-primary">リセット</button>

                {!! Form::close() !!}

                <div class="row">
                    <br />
                </div>

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

    {!! JsValidator::formRequest('App\Http\Requests\Admin\StorageRequest') !!}

@endpush