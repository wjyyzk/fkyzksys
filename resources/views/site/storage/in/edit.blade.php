@extends('layouts.master-site')

@section('title', '入庫')

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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">入庫入力フォーム</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::open(array(
                                    'method' => 'PUT',
                                    'class' => 'form-horizontal',
                                    'route' => ['storage.in.update', $model->id],
                                    'onreset' => 'resetHandler();')) !!}

                                    {{ csrf_field() }}

                                    <!-- ID -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">ID</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('id', $model->storage_id, 
                                            array(
                                                'required',
                                                'id' => 'id',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'oninput' => 'reqStorage()'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            {!! Form::text('hinban1', $model->storage->hinban,
                                            array(
                                                'required',
                                                'id' => 'hinban1',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-10">
                                            {!! Form::text('hinban2', $model->storage->chikouguhinban,
                                            array(
                                                'required',
                                                'id' => 'hinban2',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 在庫数 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">在庫数</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('stock_curr', $model->storage->stock_in - $model->storage->stock_out,
                                            array(
                                                'required',
                                                'id' => 'stock_curr',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'readonly'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 状態 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">状態</label>
                                        <div class="col-md-10">
                                            <div style="padding-top: 7px;">
                                            @foreach($list_hinban_types as $key => $value)
                                                @if($key)
                                                    @if($model->hinban_type == $key)
                                                    {!! Form::radio('hinban_type', $key, TRUE) !!}
                                                    @else
                                                    {!! Form::radio('hinban_type', $key, NULL) !!}
                                                    @endif
                                                    <label class="radio-inline" style="padding-top: 0px; padding-left: 5px; padding-right: 5px; padding-bottom: 5px;">{{ $value }}</label>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 入庫数 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">入庫数</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('stock', $model->stock,
                                            array(
                                                'required',
                                                'id' => 'stock',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off',
                                                'autofocus'
                                            )) !!}
                                        </div>
                                    </div>

                                    <input id="submit" type="submit" class="btn btn-primary" value="登録" />
                                    <button type="reset" class="btn btn-primary">リセット</button>
                                    <button type="button" class="btn btn-primary" onclick="return history.back()">戻る</button>
                                    
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

@push('js-script')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StockInRequest') !!}

    <script type="text/javascript">
        function resetHandler() {
            document.getElementById('submit').disabled = false;
        }

        function reqStorage() {
            valT = $('#id').val();
            $.ajax({
                type: "GET",
                url: "/api/storage/" + valT,
                data: "",
                dataType: "json",
                success: function(data) {
                    if(JSON.stringify(data.status) == "true")
                    {
                        document.getElementById('hinban1').value = eval(JSON.stringify(data.hinban));
                        document.getElementById('hinban2').value = eval(JSON.stringify(data.chikouguhinban));
                        document.getElementById('stock_curr').value = JSON.stringify(data.stock);
                        document.getElementById('submit').disabled = false;
                    }
                    else
                    {
                        document.getElementById('hinban1').value = "";
                        document.getElementById('hinban2').value = "";
                        document.getElementById('stock_curr').value = "";
                        document.getElementById('submit').disabled = true;
                    }
                },
                error: function() {
                    document.getElementById('hinban1').value = "";
                    document.getElementById('hinban2').value = "";
                    document.getElementById('stock_curr').value = "";
                }
            })
        }
    </script>

@endpush