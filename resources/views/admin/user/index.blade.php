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
                        <p class="panel-title">検索</p>
                    </div>

                    {!! Form::open(array(
                        'method' => 'GET',
                        'url' => '/admin/user/index', 
                        'class' => 'form-horizontal')) !!}
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="row">
                                <!-- ユーザー名 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">ユーザー</label>
                                        <div class="col-md-9">
                                            {!! Form::text('sUsername', Request::get('sUsername'), 
                                            array(
                                                'id' => 'sUsername',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '20'
                                            )) !!}
                                        </div>
                                    </div>                  
                                </div>
                                <!-- 管理レベル -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">管理レベル</label>
                                        <div class="col-md-9">
                                            {!! Form::select('sRole', $m_roles, Request::get('sRole'), 
                                            array(
                                                'id' => 'sRole',
                                                'class' => 'form-control hankaku'
                                            )) !!}
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary" value="検索" />
                                    <a id="reset" class="btn btn-primary" href="/admin/user/index">リセット</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    {!! Form::close() !!}

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
                        <div class="lists table-responsive">
                            @include('admin.user.list')
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