@extends('layouts.master-admin')

@section('title', '業者作成')

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
                        <p class="panel-title">業者データ</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
        						{!! Form::open(array(
									'method' => 'POST',
                                    'class' => 'form-horizontal',
									'route' => 'admin.merchant.store')) !!}

                                    {{ csrf_field() }}

                                    <!-- 業者 -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">業者</label>
                                        <div class="col-md-10">
                                            {!! Form::text('name', null, 
                                            array(
                                                'required',
                                                'id' => 'name',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255',
                                                'autocomplete' => 'off'
                                            )) !!}
                                        </div>
                                    </div>

                                    <!-- フリガナ -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">フリガナ</label>
                                        <div class="col-md-10">
                                            {!! Form::text('furigana', null, 
                                            array(
                                                'required',
                                                'id' => 'furigana',
                                                'class' => 'form-control hankaku',
                                                'maxlength' => '255',
                                                'autocomplete' => 'off'
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
    <!-- /#page-wrapper -->

@endsection

@push('js-script')

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <!-- 自動フリガナ -->
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery.autoKana.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Admin\MerchantRequest') !!}

    <script type="text/javascript">
        $(document).ready(
            function() {
                $.fn.autoKana('#name', '#furigana', {
                    katakana : true  //true：カタカナ、false：ひらがな（デフォルト）
            });
        });
    </script>

@endpush