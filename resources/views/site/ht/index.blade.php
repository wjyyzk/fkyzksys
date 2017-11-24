@extends('layouts.master-site')

@section('title', 'アップロード')

@section('content')

    <div id="page-wrapper">

        <!-- メッセージ -->
        <div class="row">
            <div class="col-lg-12">
                <br />
                @if(Session::has('message_in'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <label class="control-label">{{ Session::get('message_in') }}</label>
                    </div>
                @endif
                @if(Session::has('message_out'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <label class="control-label">{{ Session::get('message_out') }}</label>
                    </div>
                @endif                
                @if(Session::has('warning_in'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <label class="control-label">{{ Session::get('warning_in') }}</label>
                    </div>
                @endif
                @if(Session::has('warning_out'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <label class="control-label">{{ Session::get('warning_out') }}</label>
                    </div>
                @endif
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $error)
                        <label class="control-label">{{ $error }}</label>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <!-- /.row -->

        <!-- フォーム -->
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p class="panel-title">入出庫アップロード</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::open(array(
                                    'method' => 'POST',
                                    'class' => 'form-horizontal',
                                    'route' => 'ht.upload.store',
                                    'files' => 'true')) !!}

                                    {{ csrf_field() }}

                                    <!-- 入庫 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">入庫ファイル</label>
                                        <div class="col-md-10">
                                            {!! Form::file('file_stockin',  
                                            array(
                                                'id' => 'file_stockin',
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- 出庫 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">出庫ファイル</label>
                                        <div class="col-md-10">
                                            {!! Form::file('file_stockout',  
                                            array(
                                                'id' => 'file_stockout',
                                                'class' => 'form-control'
                                            )) !!}
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="登録" />
                                    <button type="reset" class="btn btn-primary">リセット</button>
                                    
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>

@endsection