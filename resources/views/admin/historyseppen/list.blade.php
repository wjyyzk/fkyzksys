@extends('layouts.master-nomenu')

@section('title', '設変履歴一覧')

@section('content')

    <div id="form-horizontal">
        
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

        <!-- テーブル -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">設変履歴一覧</p>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <a name="table"></a>
                            {{ $models->appends(request()->input())->fragment('table')->links() }}
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">コメント</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($models as $model)
                                    <tr>
                                        <td>{{ $model->comment }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $models->appends(request()->input())->fragment('table')->links() }}
                        </div>
                        <!-- /.table-responsive -->

                        <a href="/admin/storage/{{ $storage_id }}/history/create" class="btn btn-primary">作成</a>
                        <button type="button" class="btn btn-primary" onclick="javascript:window.close()">閉じる</button>

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#form-horizontal -->

@endsection