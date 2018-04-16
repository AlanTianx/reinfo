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
            <h3>申请管理员</h3>
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
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th width="50">申请人</th>
                        <th width="100">申请电话</th>
                        <th>申请理由</th>
                        <th width="150">申请时间</th>
                        <th width="150">审核人</th>
                        <th width="150">审核时间</th>
                        <th width="50">状态</th>
                        <th width="150">操作</th>
                    </tr>
                    @foreach($list as $v)
                        <tr>
                            <td>
                                <a href="#">{{$v->name}}</a>
                            </td>
                            <td>{{$v->tel}}</td>
                            <td>{{$v->reason}}</td>
                            <td>{{$v->addtime}}</td>
                            <td>
                                <a href="#">{{$v->updbyadmin}}</a>
                            </td>
                            <td>{{$v->updtime}}</td>
                            <td style="color: #0F9100;">
                                @if ($v->status == 0)
                                    申请中
                                @elseif ($v->status == 1)
                                    已通过
                                @else
                                    已拒绝
                                @endif
                            </td>
                            <td>
                                <a href="javascript:;" msg="确定要通过吗？" onclick="dlt(this, {{$v->id}}, 1)">通过</a>
                                <a href="javascript:;" msg="确定要删除吗？" onclick="dlt(this, {{$v->id}}, 2)">拒绝</a>
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
        function dlt(obj, id, s) {
            var msg = $(obj).attr('msg');
            layer.confirm(msg,{
                btn: ['YSE','NO']
            },function () {
                $.post('{{url('admin/ajaxjoinus')}}',{'id':id, 'status':s, '_token':'{{csrf_token()}}'},function (data) {
                    if(data.status==1){
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