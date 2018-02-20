@extends('layouts.master-nomenu')

@section('title', '在庫リスト詳細')

@section('content')

    <div id="form-horizontal">

        <!-- メッセージ -->
        <div class="row">
            <div class="col-lg-12">
                <br />
            </div>
        </div>
        <!-- /.row -->

        <!-- フォーム -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills panel-heading">
                        <li class="active">
                            <a href="#1" data-toggle="tab">基本情報</a>
                        </li>
                        <li>
                            <a href="#2" data-toggle="tab">詳細</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!-- 在庫リストデータ1 -->
                        <div class="panel-body tab-pane fade in active" id="1">
                            <div class="row">
                                <div class="col-lg-12 form-horizontal">

                                    <!-- 品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品番</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->hinban }}</label>
                                        </div>
                                    </div>

                                    <!-- 設変符号 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">設変符号</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->seppenfugou }}</label>
                                        </div>
                                    </div>

                                    <!-- 設変履歴 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">設変履歴</label>
                                        <div class="col-md-10">
                                            <a href="/admin/storage/{{ $model->id }}/history/list" class="btn btn-success" target="_blank">一覧</a>
                                        </div>
                                    </div>

                                    <!-- 品名 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">品名</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->name }}</label>
                                        </div>
                                    </div>

                                    <!-- 棚番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">棚番</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->tanaban }}</label>
                                        </div>
                                    </div>

                                    <!-- A/F -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">A/F</label>
                                        <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
                                                <input type="checkbox" disabled="disabled" {{ $model->af ? 'checked' : null }}>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- C/F -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">C/F</label>
                                        <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
                                                <input type="checkbox" disabled="disabled" {{ $model->cf ? 'checked' : null }}>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- その他 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">その他</label>
                                        <div class="col-md-10">
                                            <div class="control-label" style="text-align: left;">
                                                <input type="checkbox" disabled="disabled" {{ $model->other ? 'checked' : null }}>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 治工具品番 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">治工具品番</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->chikouguhinban }}</label>
                                        </div>
                                    </div>

                                    <!-- 図面 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">図番</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->zuuban }}</label>
                                        </div>
                                    </div>

                                    <!-- 業者 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">業者</label>
                                        <div class="col-md-10">
                                            <label class="form-control">
                                            @if ($model->gyousha > 0)
                                                {{ $model->merchant->name }}
                                            @endif
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 単価 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">単価</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ number_format($model->unit_price, 0, "", ",") }}</label>
                                        </div>
                                    </div>

                                    <!-- 在庫数 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">在庫数</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->stock_in - $model->stock_out }}</label>
                                        </div>
                                    </div>

                                    <!-- 中古 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">中古</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->oldStockIn - $model->oldStockOut }}</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <!-- 在庫リストデータ2 -->
                        <div class="panel-body tab-pane fade" id="2">
                            <div class="row">
                                <div class="col-lg-12 form-horizontal">

                                    <!-- 車種 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">車種</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->shashu }}</label>
                                        </div>
                                    </div>

                                    <!-- 部位 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">部位</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->bui }}</label>
                                        </div>
                                    </div>

                                    <!-- ロック方向 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">ロック方向</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->lock }}</label>
                                        </div>
                                    </div>

                                    <!-- 備考 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">備考</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->comment }}</label>
                                        </div>
                                    </div>

                                    <!-- 担当 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">担当</label>
                                        <div class="col-md-10">
                                            <label class="form-control">
                                            @if ($model->pic > 0)
                                                {{ $model->picharge->name }}
                                            @endif
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 振替単価 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">振替単価</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ number_format($model->whq, 0, "", ",") }}</label>
                                        </div>
                                    </div>

                                    <!-- 部品図面 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">部品図面</label>
                                        <div class="col-md-10">
                                            <label class="form-control">
                                            @if ($model->file1)
                                            <a href="{{ asset('/upload/file1/'.$model->file1) }}?{{ time() }}" target="_blank">リンク</a>
                                            @endif
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 予備 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">予備</label>
                                        <div class="col-md-10">
                                            <label class="form-control">
                                            @if ($model->file2)
                                            <a href="{{ asset('/upload/file2/'.$model->file2) }}?{{ time() }}" target="_blank">リンク</a>
                                            @endif
                                            </label>
                                        </div>
                                    </div>

                                    <!-- 更新日 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">更新日</label>
                                        <div class="col-md-10">
                                            <label class="form-control">{{ $model->updated_at->format('Y-m-d') }}</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>

                </div>
                <!-- /.panel -->

                <button type="button" class="btn btn-primary" onclick="javascript:window.open('', '_self', ''); window.close();">閉じる</button>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

    <div class="row">
        <br />
    </div>

@endsection