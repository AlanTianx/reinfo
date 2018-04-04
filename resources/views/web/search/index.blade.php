@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/home/css/index.css')}}">
    <script type="text/javascript" src="{{ asset('web/home/js/index.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: red">
                        系统公告：<span onclick="close_announcement(this)" style="display: block;float: right;font-size: 35px;margin-top: -31px;margin-right: -11px;cursor: pointer">×</span>
                    </div>
                    <ol class="list-content">
                        {{$announcement}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <script>
        function close_announcement(e) {
            $(e).parent().parent().hide();
        }
    </script>
@endsection
