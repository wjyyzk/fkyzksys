<!DOCTYPE html>
<html lang="ja">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="深谷在庫システム">
        <meta name="author" content="矢崎部品大東工場-技術管理">

        <title>★HV部品管理台帳 - 在庫リスト詳細</title>
        
        <script src="{{ asset('/assets/scripts/jquery-1.10.2.js') }}"></script>
        <link href="{{ asset('/assets/content/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/content/metisMenu.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/content/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/content/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/content/myStyle.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">

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
                                                    <label class="form-control">{{ $model->gyousha }}</label>
                                                </div>
                                            </div>

                                            <!-- 単価 -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">単価</label>
                                                <div class="col-md-10">
                                                    <label class="form-control">{{ number_format($model->unit_price) }}</label>
                                                </div>
                                            </div>

                                            <!-- 在庫数 -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">在庫数</label>
                                                <div class="col-md-10">
                                                    <label class="form-control">{{ $model->stock_in - $model->stock_out }}</label>
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
                                                    <label class="form-control">{{ $model->pic }}</label>
                                                </div>
                                            </div>

                                            <!-- WHQ単価報告 -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">WHQ単価報告</label>
                                                <div class="col-md-10">
                                                    <label class="form-control">{{ $model->whq }}</label>
                                                </div>
                                            </div>

                                            <!-- 部品図面 -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">部品図面</label>
                                                <div class="col-md-10">
                                                    @if ($model->file1)
                                                    <a href="{{ asset('/upload/file1/'.$model->file1) }}?{{ time() }}" class="form-control" target="_blank">リンク</a>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- 予備 -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">予備</label>
                                                <div class="col-md-10">
                                                    @if ($model->file2)
                                                    <a href="{{ asset('/upload/file2/'.$model->file2) }}?{{ time() }}" class="form-control" target="_blank">リンク</a>
                                                    @endif
                                                </div>
                                            </div>                                            

                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->

                            </div>

                        </div>
                        <!-- /.panel -->

                        <button type="button" class="btn btn-primary" onclick="javascript:window.close()">閉じる</button>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /#page-wrapper -->

            <div class="row">
                <br />
            </div>

        </div>
        <!-- /#wrapper -->

        <script src="{{ asset('/assets/scripts/jquery-ui-1.10.2.js') }}"></script>
        <script src="{{ asset('/assets/scripts/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/scripts/metisMenu.min.js') }}"></script>
        <script src="{{ asset('/assets/scripts/sb-admin-2.js') }}"></script>

    </body>

</html>