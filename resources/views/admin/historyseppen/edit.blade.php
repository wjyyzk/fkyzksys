@extends('layouts.master-nomenu')

@section('title', '設変編集')

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
                        <p class="panel-title">設変データ</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::open(array(
                                    'method' => 'PUT',
                                    'class' => 'form-horizontal',
                                    'route' => ['admin.storage.history.update', $storage_id, $model->id])) !!}

                                    <!-- コメント -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">コメント</label>
                                        <div class="col-md-10">
                                            {!! Form::textarea('comment', $model->comment, 
                                            array(
                                                'required',
                                                'rows' => 2,
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="登録" />
                                    <button type="reset" class="btn btn-primary">リセット</button>
                                    <button type="button" class="btn btn-primary" onclick="return history.back()">戻る</button>
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
    <!-- /#form-horizontal -->	

@endsection

@push('js-script')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Admin\StorageRequest') !!}

@endpush