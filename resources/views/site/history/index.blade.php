@extends('layouts.master-site')

@section('title', '在庫履歴一覧')

@section('content')

    <div id="page-wrapper">
        
        <!-- メッセージ -->
        <div class="row">
            <div class="col-lg-12">
                <br />
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
                                    'url' => '/history', 
                                    'class' => 'form-horizontal')) !!}

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('sHinban', Request::get('sHinban'), 
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
                                            {!! Form::tel('sChikouguhinban', Request::get('sChikouguhinban'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 種類 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">種類</label>
                                        <div class="col-md-10">
                                            {!! Form::select('sType', $types, Request::get('sType'), 
                                            array(
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>                                    

                                    <input type="submit" class="btn btn-primary" value="検索" />
                                    <a class="btn btn-primary" href="/history">リセット</a>

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
                        <p class="panel-title">在庫履歴一覧</p>
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
                                        <th class="text-center">治工具品番</th>
                                        <th class="text-center">数量</th>
                                        <th class="text-center">日付</th>
                                        <th class="text-center">時刻</th>
                                        <th class="text-center">編集</th>
                                        <th class="text-center">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($models as $model)
                                    <tr>
                                        <td class="text-left">{{ $model['storage']['hinban'] }}</td>
                                        <td>{{ $model['storage']['chikouguhinban'] }}</td>
                                        <td>
                                        @if($model['type'] == 1)
                                            {{ $model['stock'] }}
                                        @else
                                            {{ $model['stock'] * -1 }}
                                        @endif
                                        </td>
                                        <td>{{ $model['date'] }}</td>
                                        <td>{{ $model['time'] }}</td>
                                        <td>
                                        @if($model['type'] == 1)
                                            <a href="{{ route('storage.in.edit', [$model['id']]) }}" class="btn btn-outline btn-warning">編集</a>
                                        @else
                                            <a href="{{ route('storage.out.edit', [$model['id']]) }}" class="btn btn-outline btn-warning">編集</a>
                                        @endif
                                        </td>
                                        <td>
                                        @if($model['type'] == 1)
                                            {{ Form::open(['route' => ['storage.in.destroy', $model['id']], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                                                削除
                                            </button>
                                            {{ Form::close() }}
                                        @else
                                            {{ Form::open(['route' => ['storage.out.destroy', $model['id']], 'method' => 'delete']) }}
                                            <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                                                削除
                                            </button>
                                            {{ Form::close() }}                                        
                                        @endif
                                        </td>
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