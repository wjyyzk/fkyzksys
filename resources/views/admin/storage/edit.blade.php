@extends('layouts.master-admin')

@section('title', '在庫リスト編集')

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
                    'method' => 'PUT',
                    'class' => 'form-horizontal',
                    'route' => ['admin.storage.update', $model->id],
                    'files' => 'true')) !!}

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
                                                {!! Form::text('hinban', $model->hinban, 
                                                array(
                                                    'required',
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '255'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 治工具品番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">治工具品番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('chikouguhinban', $model->chikouguhinban, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '10'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 設変符号 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">設変符号</label>
                                            <div class="col-md-10">
                                                {!! Form::text('seppenfugou', $model->seppenfugou, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '10'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 設変履歴 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">設変履歴</label>
                                            <div class="col-md-10">
                                                <a href="/admin/storage/{{ $model->id }}/history" class="btn btn-success" target="_blank">一覧</a>
                                            </div>
                                        </div>

                                        <!-- 品名 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">品名</label>
                                            <div class="col-md-10">
                                                {!! Form::text('name', $model->name, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '100'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- A/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">A/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                    {!! Form::checkbox('af', '1', $model->af) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- C/F -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">C/F</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('cf', '1', $model->cf) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- その他 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">その他</label>
                                            <div class="col-md-10">
                                                <div class="control-label" style="text-align: left;">
                                                   {!! Form::checkbox('other', '1', $model->other) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 図番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">図番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('zuuban', $model->zuuban, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 業者 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">業者</label>
                                            <div class="col-md-10">
                                                {!! Form::select('gyousha', $m_merchants, $model->gyousha, 
                                                array(
                                                    'class' => 'form-control'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 単価 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">単価</label>
                                            <div class="col-md-10">
                                                {!! Form::tel('unit_price', $model->unit_price, 
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
                                                {!! Form::text('shashu', $model->shashu, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 部位 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">部位</label>
                                            <div class="col-md-10">
                                                {!! Form::text('bui', $model->bui, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- ロック方向 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">ロック方向</label>
                                            <div class="col-md-10">
                                                {!! Form::text('lock', $model->lock, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '20'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 備考 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">備考</label>
                                            <div class="col-md-10">
                                                {!! Form::text('comment', $model->comment, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '255'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 担当 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">担当</label>
                                            <div class="col-md-10">
                                                {!! Form::select('pic', $m_pics, $model->pic, 
                                                array(
                                                    'class' => 'form-control hankaku'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 棚番 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">棚番</label>
                                            <div class="col-md-10">
                                                {!! Form::text('tanaban', $model->tanaban, 
                                                array(
                                                    'class' => 'form-control hankaku',
                                                    'maxlength' => '100'
                                                )) !!}
                                            </div>
                                        </div>

                                        <!-- 振替単価 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">振替単価</label>
                                            <div class="col-md-10">
                                                {!! Form::text('whq', $model->whq, 
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
                                                @if ($model->file1)
                                                <a href="{{ asset('/upload/file1/'.$model->file1) }}?{{ time() }}" class="form-control" target="_blank">リンク</a>
                                                @endif
                                                {!! Form::file('file1', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>

                                        <!-- 予備 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">予備</label>
                                            <div class="col-md-10">
                                                @if ($model->file2)
                                                <a href="{{ asset('/upload/file2/'.$model->file2) }}?{{ time() }}" class="form-control" target="_blank">リンク</a>
                                                @endif
                                                {!! Form::file('file2', array('class' => 'form-control')) !!}
                                            </div>
                                        </div>

                                        <!-- 更新日 -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">更新日</label>
                                            <div class="col-md-10">
                                                {!! Form::text('updated_at', $model->updated_at->format('Y-m-d'), 
                                                array(
                                                    'class' => 'form-control',
                                                    'readonly'
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
                    <button type="button" class="btn btn-primary" onclick="return history.back()">戻る</button>

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
            document.getElementById('whq').value = textbox.value * 1.2;
        }
    </script>

@endpush