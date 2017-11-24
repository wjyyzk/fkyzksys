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

                {!! Form::open(array(
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'route' => 'admin.storage.store',
                    'files' => 'true')) !!}

                    {{ csrf_field() }}

                    <div class="panel panel-default">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills panel-heading">
                            <li class="active">
                                <a href="#1" data-toggle="tab">基本情報</a>
                            </li>
                            <li>
                                <a href="#2" data-toggle="tab">詳細</a>
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
                                                {!! Form::text('hinban', null, 
                                                array(
                                                    'required',
                                                    'id' => 'hinban',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '255'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 治工具品番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">治工具品番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('chikouguhinban', null, 
                                                array(
                                                    'id' => 'chikouguhinban',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '10'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 設変符号 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">設変符号</label>
                                            <div class="col-md-10">
                                                {!! Form::text('seppenfugou', null, 
                                                array(
                                                    'id' => 'seppenfugou',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '10'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 品名 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">品名</label>
                                            <div class="col-md-10">
                                                {!! Form::text('name', null, 
                                                array(
                                                    'id' => 'name',
                                                    'class' => 'form-control',
                                                    'maxlength' => '100'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- A/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">A/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('af', '1', Request::get('af'),
                                                    array(
                                                        'id' => 'af'
                                                    )) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- C/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">C/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('cf', '1', Request::get('cf'),
                                                    array(
                                                        'id' => 'cf'
                                                    )) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- その他 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">その他</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('other', '1', Request::get('other'),
                                                    array(
                                                        'id' => 'other'
                                                    )) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 図番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">図番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('zuuban', null, 
                                                array(
                                                    'id' => 'zuuban',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 業者 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">業者</label>
                                            <div class="col-md-10">
                                                {!! Form::select('gyousha', $m_merchants, null, 
                                                array(
                                                    'id' => 'gyousha',
                                                    'class' => 'form-control'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 単価 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">単価</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('unit_price', null, 
                                                array(
                                                    'id'        => 'unit_price',
                                                    'class'     => 'form-control hankaku',
                                                    'onkeyup'   => 'sync(this)'
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
                                                {!! Form::text('shashu', null, 
                                                array(
                                                    'id' => 'shashu',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 部位 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">部位</label>
                                            <div class="col-md-10">
                                                {!! Form::text('bui', null, 
                                                array(
                                                    'id' => 'bui',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- ロック方向 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ロック方向</label>
                                            <div class="col-md-10">
                                                {!! Form::text('lock', null, 
                                                array(
                                                    'id' => 'lock',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 備考 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">備考</label>
                                            <div class="col-md-10">
                                                {!! Form::textarea('comment', null, 
                                                array(
                                                    'id' => 'comment',
                                                    'class' => 'form-control hankaku',
                                                    'rows' => 2,
                                                    'maxlength' => '255'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 担当 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">担当</label>
                                            <div class="col-md-10">
                                                {!! Form::select('pic', $m_pics, null, 
                                                array(
                                                    'id' => 'pic',
                                                    'class' => 'form-control'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 棚番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">棚番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('tanaban', null, 
                                                array(
                                                    'id' => 'tanaban',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '100'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 振替単価 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">振替単価</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('whq', null, 
                                                array(
                                                    'id'    => 'whq',
                                                    'class' => 'form-control hankaku',
                                                    'readonly'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 部品図面 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">部品図面</label>
                                            <div class="col-md-10">
                                                {!! Form::file('file1',  
                                                array(
                                                    'id' => 'file1',
                                                    'class' => 'form-control'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 予備 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">予備</label>
                                            <div class="col-md-10">
                                                {!! Form::file('file2', 
                                                array(
                                                    'id' => 'file2',
                                                    'class' => 'form-control'
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
                    <button type="button" class="btn btn-primary" onclick="reqCopy()">コピー</button>

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

    <script type="text/javascript">
        function sync(textbox) {
            document.getElementById('whq').value = Math.round(textbox.value * 1.2);
        }

        function reqCopy() {
            $.ajax({
                type: "GET",
                url: "/api/storage/data/last",
                data: "",
                dataType: "json",
                success: function(data) {
                    if(JSON.stringify(data.status) == "true")
                    {
                        document.getElementById('hinban').value = eval(JSON.stringify(data.hinban));
                        document.getElementById('chikouguhinban').value = eval(JSON.stringify(data.chikouguhinban));
                        document.getElementById('seppenfugou').value = eval(JSON.stringify(data.seppenfugou));
                        document.getElementById('name').value = eval(JSON.stringify(data.name));
                        document.getElementById('af').checked = eval(JSON.stringify(data.af));
                        document.getElementById('cf').checked = eval(JSON.stringify(data.cf));
                        document.getElementById('other').checked = eval(JSON.stringify(data.other));
                        document.getElementById('zuuban').value = eval(JSON.stringify(data.zuuban));
                        document.getElementById('gyousha').value = JSON.stringify(data.gyousha);
                        document.getElementById('unit_price').value = JSON.stringify(data.unit_price);
                        document.getElementById('shashu').value = eval(JSON.stringify(data.shashu));
                        document.getElementById('bui').value = eval(JSON.stringify(data.bui));
                        document.getElementById('lock').value = eval(JSON.stringify(data.lock));
                        document.getElementById('comment').value = eval(JSON.stringify(data.comment));
                        document.getElementById('pic').value = JSON.stringify(data.pic);
                        document.getElementById('tanaban').value = eval(JSON.stringify(data.tanaban));
                        document.getElementById('whq').value = JSON.stringify(data.whq);
                    }
                    else
                    {
                        clearInput();
                    }
                },
                error: function() {
                    clearInput();
                }
            })
        }

        function clearInput()
        {
            document.getElementById('hinban').value = "";
            document.getElementById('chikouguhinban').value = "";
            document.getElementById('seppenfugou').value = "";
            document.getElementById('name').value = "";
            document.getElementById('af').value = "";
            document.getElementById('cf').value = "";
            document.getElementById('other').value = "";
            document.getElementById('zuuban').value = "";
            document.getElementById('gyousha').value = "";
            document.getElementById('unit_price').value = "";
            document.getElementById('shashu').value = "";
            document.getElementById('bui').value = "";
            document.getElementById('lock').value = "";
            document.getElementById('comment').value = "";
            document.getElementById('pic').value = "";
            document.getElementById('tanaban').value = "";
            document.getElementById('whq').value = "";
        }
    </script>

@endpush