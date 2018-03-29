@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/home/css/index.css')}}">
    <script type="text/javascript" src="{{ asset('web/home/js/index.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        我的记事录
                        <a style="margin-left: 550px" href="{{url('notepad/create')}}"><i class="fa fa-pencil"></i> </a>
                    </div>
                    <ol class="list-content">
                        @foreach($list as $v)
                            <li style="margin-top: 10px">
                                <a href="javascript:void(0)" class="hideclick">
                                    {{$v->title}}---{{mb_substr($v->content,0,10)}}---{{$v->addtime}}
                                </a>
                                @if($v->status==0)
                                    <span style="display: inline-block;margin-left: 80px">私密</span>
                                @else
                                    <span style="display: inline-block;margin-left: 80px">公开</span>
                                @endif
                            </li>
                            <p>{!! $v->content !!}<a href="{{url('notepad/'.$v->id.'/edit')}}"><i class="fa fa-pencil"></i> </a></p>
                        @endforeach
                    </ol>
                    <div class="page_list">
                        <ul>
                            {{$list->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
