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
                                        <td class="text-left">{{ $model['storage_id'] }}</td>
                                        <td>{{ $model['stock'] }}</td>
                                        <td>{{ $model['date'] }}</td>
                                        <td>{{ $model['time'] }}</td>
                                        <td>編集</td>
                                        <td>削除</td>
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