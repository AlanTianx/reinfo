@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;常用管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <div class="result_wrap">
            <h3>菜单管理</h3>
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
                    <a href="{{url('admin/menu/create')}}"><i class="fa fa-plus"></i>新增</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">排序</th>
                        <th>菜单名</th>
                        <th>url</th>
                        <th>隐藏</th>
                        <th>操作</th>
                    </tr>
                    @foreach($menutree as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="ajaxorder(this,{{$v->id}});" name="order" value="{{$v->order}}">
                            </td>
                            <td>
                                <a href="#">{{$v->name}}</a>
                            </td>
                            <td>{{$v->url}}</td>
                            <td>{{$v->display}}</td>
                            <td>
                                <a href="{{url('admin/menu/'.$v->id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="dlt({{$v->id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="page_list">
                    <ul>
                        {{--{{$data->links()}}--}}
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
                $.post('{{url('admin/menu/')}}/'+id,{'_method':'delete','_token':'{{csrf_token()}}'},function (data) {
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
        function ajaxorder(obj,id) {
            var order = obj.value;
            $.ajax({
                url:'{{url('admin/menu/ajaxorder')}}',
                data:{'order':order,'id':id},
                type:'POST',
                dataType:'json',
                headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                success: function (data) {
                    if(data.code==0){
                        layer.msg(data.msg,{icon:6},function () {
                            location.reload();
                        });
                    }else {
                        layer.msg(data.msg,{icon:5});
                    }
                }
            });
        }
    </script>
    <!--搜索结果页面 列表 结束-->
@endsection