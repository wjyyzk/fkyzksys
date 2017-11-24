@extends('layouts.master-admin')

@section('title', '業者一覧')

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
                        <a href="#" class="panel-title" data-toggle="collapse" data-target="#search">検索</a>
                    </div>
                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-lg-12">

                                {!! Form::open(array(
                                    'method' => 'GET',
                                    'url' => '/admin/merchant/index', 
                                    'class' => 'form-horizontal')) !!}

                                    {{ csrf_field() }}

                                    <!-- 業者 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">業者</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('sName', Request::get('sName'), 
                                            array(
                                                'id' => 'sName',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255'
                                            )) !!}
                                        </div>
                                    </div>
                                    <button type="submit" name="search" class="btn btn-primary" value="search">検索</button>
                                    <a id="reset" class="btn btn-primary" href="/admin/merchant/index">リセット</a>
                                    <button type="submit" name="excel" class="btn btn-primary" value="excel">エクセル</button>

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
                        <p class="panel-title">業者一覧</p>
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
                                            <th class="text-center">業者</th>
                                            <th class="text-center">編集</th>
                                            <th class="text-center">削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($models as $model)
                                        <tr>
                                            <td>{{ $model->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.merchant.edit', [$model->id]) }}" class="btn btn-outline btn-warning">編集</a>
                                            </td>
                                            <td>
                                                {{ Form::open(['route' => ['admin.merchant.destroy', $model->id], 'method' => 'delete']) }}
                                                <button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
                                                    削除
                                                </button>
                                                {{ Form::close() }}
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