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
                    <p class="panel-title">在庫リスト一覧</p>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <a name="table"></a>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                            		<td>1</td>
                            	</tr>
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