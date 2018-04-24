@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;信息管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <div class="result_wrap">
            <div class="mark">
                <h3>
                    @switch($type)
                        @case('1')
                        已通过
                        @break
                        @case('2')
                        待审核
                        @break
                        @case('3')
                        已删除
                        @break
                    @endswitch
                </h3>
                @if(count($errors)>0)
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    @else
                        <p style="color:red">{{$errors}}</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>主题内容</th>
                        <th>添加时间</th>
                        <th>最后修改时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($list as $v)
                        <tr>
                            <td class="tc">{{$v->id}}</td>
                            <td  height="200" width="800">{!! $v->content !!}</td>
                            <td>{{$v->addtime}}</td>
                            <td>{{$v->lastupdtime}}</td>
                            <td>
                                @switch($type)
                                    @case('2')
                                    <a href="javascript:;" data-msg="确定要通过？" onclick="dlt({{$v->id}},this,'1')">通过</a>
                                    <a href="javascript:;" data-msg="确定要删除？" onclick="dlt({{$v->id}},this,'3')">删除</a>
                                    @break
                                    @case('1')
                                    <a href="javascript:;" data-msg="确定要删除？" onclick="dlt({{$v->id}},this,'3')">删除</a>
                                    @break
                                    @case('3')
                                    <a href="javascript:;" data-msg="确定要通过？" onclick="dlt({{$v->id}},this,'1')">通过</a>
                                    @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    <ul>
                        {{$list->links()}}
                    </ul>
                    <style>
                        .result_content ul li span{
                            font-size: 15px;
                            padding: 6px 15px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </form>
    <script>
        function dlt(id,obj,ty) {
            var msg = obj.getAttribute('data-msg');
            layer.confirm(msg,{
                btn: ['YSE','NO']
            },function () {
                $.post('{{url('admin/auditPass')}}',{'id':id,'ty':ty,'_token':'{{csrf_token()}}'},function (data) {
                    if(data.status==0){
                        layer.msg(data.msg,{icon:6},function () {
                            location.reload();
                        });
                    }else {
                        layer.msg(data.msg,{icon:5});
                    }
                })
            });
        }
    </script>
    <!--搜索结果页面 列表 结束-->
@endsection