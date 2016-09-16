@extends('layouts.master-admin')

@section('title', 'ユーザー一覧')

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
                            search
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
                            		<td>{{ $user->user }}</td>
                            		<td>{{ $user->password }}</td>
                            		<td>
                            			<a href="{{ url('admin/user', [$user->id]) }}" class="btn btn-outline btn-warning">編集</a>
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