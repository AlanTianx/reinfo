@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">我的记事录</div>
                    <ol class="">
                        @foreach($list as $v)
                            <li style="margin-top: 10px">
                                <a>
                                    {{$v->title}}---{{$v->content}}---{{$v->addtime}}
                                </a>
                                <p style="display: inline-block;margin-left: 80px">私密</p>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
