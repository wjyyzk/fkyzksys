@extends('layouts.master-admin')

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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">金額合計： {{ number_format($totalFee, 0, "", ".") }}円</p>
                        <p class="panel-title">在庫数の総合計： {{ number_format($totalCount, 0, "", ".") }}</p>
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
                                    'url' => '/admin/storage/index', 
                                    'class' => 'form-horizontal')) !!}

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            {!! Form::text('sHinban', Request::get('sHinban'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255'
                                            )) !!}
                                        </div>
                                    </div>
                                    <!-- 治工具品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">治工具品番</label>
                                        <div class="col-md-10">
                                            {!! Form::text('sChikouguhinban', Request::get('sChikouguhinban'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10'
                                            )) !!}
                                        </div>
                                    </div>
                                    <!-- 品名 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品名</label>
                                        <div class="col-md-10">
                                            {!! Form::text('sName', Request::get('sName'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255'
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
                                    <!-- 業者 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">業者</label>
                                        <div class="col-md-10">
                                            {!! Form::select('sGyousha', $m_merchants, Request::get('sGyousha'), 
                                            array(
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>
                                    <!-- 車種 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">車種</label>
                                        <div class="col-md-10">
                                            {!! Form::text('sShashu', Request::get('sShashu'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '20'
                                            )) !!}
                                        </div>
                                    </div>
                                    <!-- 並び順 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">並び順</label>
                                        <div class="col-md-10">
                                            {!! Form::select('sOrder', $m_orders, Request::get('sOrder'), 
                                            array(
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="検索" />
                                    <a class="btn btn-primary" href="/admin/storage/index">リセット</a>

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
                            @if($models->count() > 0)
                                <a name="table"></a>
                                {{ $models->appends(request()->input())->fragment('table')->links() }}
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">品番</th>
                                            <th class="text-center">品名</th>
                                            <th class="text-center">治工具品番</th>
                                            <th class="text-center">詳細</th>
                                            <th class="text-center">設変符号</th>
                                            <th class="text-center">業者</th>
                                            <th class="text-center">単価</th>
                                            <th class="text-center">在庫数</th>
                                            @if (Auth::user()->role == '管理者')
                                                <th class="text-center">編集</th>
                                                <th class="text-center">削除</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($models as $model)
                                        <tr>
                                            <td class="text-left">{{ $model->id }}</td>
                                            <td class="text-left">{{ $model->hinban }}</td>
                                            <td class="text-left">{{ $model->name }}</td>
                                            <td>{{ $model->chikouguhinban }}</td>
                                            <td>
                                                <a href="{{ route('admin.storage.show', [$model->id]) }}" class="btn btn-primary btn-circle" target="_blank">
                                                <i class="fa fa-link"></i></a>
                                            </td>
                                            <td>{{ $model->seppenfugou }}</td>
                                            <td>
                                                @if ($model->gyousha > 0)
                                                    {{ $model->merchant->name }}
                                                @else
                                                @endif
                                            </td>
                                            <td>{{ number_format($model->unit_price, 0, "", ".") }}</td>
                                            <td>{{ $model->stockIn - $model->stockOut }}</td>
                                            @if (Auth::user()->role == '管理者')
                                                <td>
                                                    <a href="{{ route('admin.storage.edit', [$model->id]) }}" class="btn btn-outline btn-warning">編集</a>
                                                </td>
                                                <td>
                                                    {{ Form::open(['route' => ['admin.storage.destroy', $model->id], 'method' => 'delete']) }}
                                                    <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                                                        削除
                                                    </button>
                                                    {{ Form::close() }}
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $models->appends(request()->input())->fragment('table')->links() }}
                            @else
                                <label>データがありません。</label>
                            @endif
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