@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/search/css/index.css')}}">
    <link rel="stylesheet" href="{{url('web/search/css/re.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="position: absolute;left: -6%;width: 110%">
                    <div class="panel-heading">
                        <div>
                            详细内容
                            <a style="margin-left: 88%" href="javascript:void(0)" onclick="history.go(-1)">Back</a>
                        </div>
                    </div>
                    <ol class="list-content">
                        <div class="result_wrap" style="text-align: center;">
                            <h2 style="color: #003366">{{$info->com_title}}</h2>
                            <span style="font-size: 12px;margin-top: 15px; color: #CCCC99">时间:{{$info->com_time}}　作者:{{$info->user_name}}　阅读:{{$info->com_view}}</span>
                            <p>公司:　{{$info->com_name}}</p>
                            <div style="margin-top: 50px">
                                @if($info->com_img)
                                    <img src="{{asset('uploads/'.$info->com_img)}}" alt="图片损坏" style="height: 28%;width: 28%">
                                @endif
                                <p>{!! $info->com_content !!}</p>
                            </div>
                        </div>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
