@extends('layouts.master-site')

@section('title', '在庫リスト一覧')

@section('content')

<div id="page-wrapper">
    
    <!-- メッセージ -->
    <div class="row">
        <br />
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
                            <!-- 品番 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label">品番</label>
                                <div class="col-md-10">
                                    {!! Form::tel('sName', null, 
                                    array(
                                        'class' => 'form-control hankaku',
                                    )) !!}
                                </div>
                            </div>
                            <a class="btn btn-primary" href="#">検索</a>
                            <a class="btn btn-primary" href="/admin/storage/index">リセット</a>
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
                        {{ $models->links() }}
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">品番1</th>
                                    <th class="text-center">設変符号</th>
                                    <th class="text-center">品番名</th>
                                    <th class="text-center">AC</th>
                                    <th class="text-center">CF</th>
                                    <th class="text-center">その他</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                <tr>
                                    <td>{{ $model->hinban1 }}</td>
                                    <td>{{ $model->seppenfugou }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td>
                                        @if ($model->ac)
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $models->links() }}
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