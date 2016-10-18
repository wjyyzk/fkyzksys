@extends('layouts.master-site')

@section('title', '在庫リスト一覧')

@section('content')

    <div id="page-wrapper">
        
        <!-- メッセージ -->
        <div class="row">
        	<div class="col-lg-12">
        		<br />
        		<div class="panel panel-primary">
        			<div class="panel-heading">
        				<p class="panel-title">金額合計： {{ $totalFee }}円</p>
        			</div>
        		</div>
            </div>
        </div>
        <!-- /.row -->

        <!-- 検索条件 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="#" class="panel-title" data-toggle="collapse" data-target="#search">検索</a>
                    </div>
                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-lg-12">

                                {!! Form::open(array(
                                    'method' => 'GET',
                                    'url' => '/storage', 
                                    'class' => 'form-horizontal')) !!}

    	                            <!-- 品番 -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">品番</label>
    	                                <div class="col-md-10">
    	                                    {!! Form::tel('sHinban', Request::get('sHinban'), 
    	                                    array(
    	                                        'class' => 'form-control hankaku',
    	                                    )) !!}
    	                                </div>
    	                            </div>
    	                            <!-- A/F -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">A/F</label>
    	                                <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
                                                {!! Form::checkbox('sAF', 'af', Request::get('sAF')) !!}
                                            </div>
    	                                </div>
    	                            </div>
    	                            <!-- C/F -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">C/F</label>
    	                                <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
    	                                       {!! Form::checkbox('sCF', 'cf', Request::get('sCF')) !!}
                                            </div>
    	                                </div>
    	                            </div>
    	                            <!-- その他 -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">その他</label>
    	                                <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
                                               {!! Form::checkbox('sOther', 'other', Request::get('sOther')) !!}
                                            </div>
    	                                </div>
    	                            </div>
    	                            <!-- 治工具品番 -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">治工具品番</label>
    	                                <div class="col-md-10">
    	                                    {!! Form::tel('sChikouguhinban', Request::get('sChikouguhinban'), 
    	                                    array(
    	                                        'class' => 'form-control hankaku',
    	                                    )) !!}
    	                                </div>
    	                            </div>
    	                            <!-- 業者 -->
    	                            <div class="form-group">
    	                                <label class="col-md-2 control-label">業者</label>
    	                                <div class="col-md-10">
    	                                    {!! Form::tel('sGyousha', Request::get('sGyousha'), 
    	                                    array(
    	                                        'class' => 'form-control hankaku',
    	                                    )) !!}
    	                                </div>
    	                            </div>
    	                            <input type="submit" class="btn btn-primary" value="検索" />
    	                            <a class="btn btn-primary" href="/storage">リセット</a>

    	                        {!! Form::close() !!}

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
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
                        <div class="table-responsive">
                            <a name="table"></a>
                            {{ $models->appends(request()->input())->fragment('table')->links() }}
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">品番</th>
                                        <th class="text-center">棚番</th>
                                        <th class="text-center">詳細</th>
                                        <th class="text-center">設変符号</th>
                                        <th class="text-center">A/F</th>
                                        <th class="text-center">C/F</th>
                                        <th class="text-center">その他</th>
                                        <th class="text-center">治工具品番</th>
                                        <th class="text-center">業者</th>
                                        <th class="text-center">単価</th>
                                        <th class="text-center">在庫数</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($models as $model)
                                    <tr>
                                        <td>{{ $model->hinban }}</td>
                                        <td>{{ $model->tanaban }}</td>
                                        <td>
                                            <a href="/storage/{{ $model->id }}"
                                               class="btn btn-primary btn-circle" target="_blank">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </td>
                                        <td>{{ $model->seppenfugou }}</td>
                                        <td>
                                            @if ($model->af)
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($model->cf)
                                                <i class="fa fa-check"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($model->other)
                                                <i class="fa fa-check"></i>
                                            @endif                                        
                                        </td>
                                        <td>{{ $model->chikouguhinban }}</td>
                                        <td>{{ $model->gyousha }}</td>
                                        <td>{{ $model->unit_price }}</td>
                                        <td>{{ $model->stock_in - $model->stock_out }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $models->appends(request()->input())->fragment('table')->links() }}
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