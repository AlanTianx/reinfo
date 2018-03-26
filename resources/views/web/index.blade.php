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
                                    {{$v->title}}---{{mb_substr($v->content,0,10)}}---{{$v->addtime}}
                                </a>
                                @if($v->status==0)
                                    <p style="display: inline-block;margin-left: 80px">私密</p>
                                @else
                                    <p style="display: inline-block;margin-left: 80px">公开</p>
                                @endif

                            </li>
                        @endforeach
                    </ol>
                    <div class="page_list">
                        <ul>
                            {{$list->links()}}
                        </ul>
                        {{--<style>--}}
                            {{--.result_content ul li span{--}}
                                {{--font-size: 15px;--}}
                                {{--padding: 6px 15px;--}}
                            {{--}--}}
                        {{--</style>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
