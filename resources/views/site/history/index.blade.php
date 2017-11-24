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

                                    {{ csrf_field() }}

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('sHinban', Request::get('sHinban'), 
                                            array(
                                                'id' => 'sHinban',
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
                                                'id' => 'sChikouguhinban',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '10'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 日付 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">日付</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('sDate', Request::get('sDate'), 
                                            array(
                                                'id' => 'sDate',
                                                'class' => 'form-control hankaku',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 状態 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">状態</label>
                                        <div class="col-md-10">
                                            {!! Form::select('sHinbanType', $hinban_types, Request::get('sHinbanType'), 
                                            array(
                                                'id' => 'sHinbanType',
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 入出庫 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">入出庫</label>
                                        <div class="col-md-10">
                                            {!! Form::select('sType', $types, Request::get('sType'), 
                                            array(
                                                'id' => 'sType',
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
                            @if($models->count() > 0)
                                <a name="table"></a>
                                {{ $models->appends(request()->input())->fragment('table')->links() }}
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">品番</th>
                                            <th class="text-center">治工具品番</th>
                                            <th class="text-center">状態</th>
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
                                            <td>{{ $hinban_types[$model['hinban_type']] }}</td>
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

@push('js-script')

    <script src="{{ asset('/assets/scripts/jquery.ui.datepicker-ja.min.js') }}"></script>

    <script type="text/javascript">
        $("#sDate").datepicker();
    </script>

@endpush