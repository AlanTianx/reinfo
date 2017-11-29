@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;分类列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <div class="result_wrap">
            <div class="mark">
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
        {{--<form action="" method="post">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="120">选择分类:</th>--}}
                    {{--<td>--}}
                        {{--<select onchange="javascript:location.href=this.value;">--}}
                            {{--<option value="">全部</option>--}}
                            {{--<option value="http://www.baidu.com">百度</option>--}}
                            {{--<option value="http://www.sina.com">新浪</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<th width="70">关键字:</th>--}}
                    {{--<td><input type="text" name="keywords" placeholder="关键字"></td>--}}
                    {{--<td><input type="submit" name="sub" value="查询"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/addadmin')}}"><i class="fa fa-plus"></i>新增管理</a>
                    <a href="javascript:;" onclick="window.onload();"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>名字</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" name="cate_order" value="{{$v->cate_order}}">
                            </td>
                            <td class="tc">{{$v->cate_id}}</td>
                            <td>
                                <a href="#">{{$v->cate_name}}</a>
                            </td>
                            <td>{{$v->cate_time}}</td>
                            <td>
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