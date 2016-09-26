@extends('layouts.master-admin')

@section('title', 'ユーザー一覧')

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
                                    'url' => '/admin/user/index', 
                                    'class' => 'form-horizontal')) !!}

                                    <!-- ユーザー名 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">ユーザー</label>
                                        <div class="col-md-10">
                                            {!! Form::tel('sUsername', Request::get('sUsername'), 
                                            array(
                                                'class' => 'form-control hankaku',
                                            )) !!}
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="検索" />
                                    <a class="btn btn-primary" href="/admin/user/index">リセット</a>

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
                        <p class="panel-title">ユーザー一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <a name="table"></a>
                            {{ $users->appends(request()->input())->fragment('table')->links() }}
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">ユーザー</th>
                                        <th class="text-center">パスワード</th>
                                        <th class="text-center">編集</th>
                                        <th class="text-center">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($users as $user)
                                	<tr>
                                		<td>{{ $user->username }}</td>
                                		<td>******</td>
                                		<td>
                                			<a href="{{ route('admin.user.edit', [$user->id]) }}" class="btn btn-outline btn-warning">編集</a>
                                		</td>
                                		<td>
                                			{{ Form::open(['route' => ['admin.user.destroy', $user->id], 'method' => 'delete']) }}
    										<button type="submit" class="btn btn-outline btn-danger" onclick="return confirm('データを削除しますか。')">
    											削除
    										</button>
    										{{ Form::close() }}
                                		</td>
                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                            {{ $users->appends(request()->input())->fragment('table')->links() }}
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