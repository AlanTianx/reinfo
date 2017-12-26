@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 管理员管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <div class="result_wrap">
            <h3>管理员列表</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    @else
                        <p style="color:red">{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/addadmin')}}"><i class="fa fa-plus"></i>新增管理</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>名字</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">{{$v->us_id}}</td>
                            <td>
                                <a href="#">{{$v->us_name}}</a>
                            </td>
                            <td>{{$v->us_time}}</td>
                            <td>
                                <a href="#">分配权限</a>
                                <a href="#">分配菜单</a>
                                <a href="javascript:;" onclick="dlt({{$v->us_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    <ul>
                        {{$data->links()}}
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
        function dlt(id) {
            layer.confirm('你确定要删除吗',{
                btn: ['YSE','NO']
            },function () {
                $.post('{{url('admin/dltadmin/')}}/'+id,{'_token':'{{csrf_token()}}'},function (data) {
                    if(data.status==0){
                        layer.msg(data.msg,{icon:6});
                        setTimeout(function () {
                            location.reload();
                        },500);
                    }else {
                        layer.msg(data.msg,{icon:5});
                    }
                })
            });
        }
    </script>
    <!--搜索结果页面 列表 结束-->
@endsection