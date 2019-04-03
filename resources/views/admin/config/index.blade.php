@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 常用管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>web配置</h3>
            @if(is_array($errors)&&count($errors)>0)
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
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/config')}}" method="post">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <tr>
                    <th><i class="require">*</i>网站标题：</th>
                    <td>
                        <input type="hidden" value="{{$info['id'] ?? ''}}" name="id">
                        <input type="text" class="lg" name="title" value="{{$info['title'] ?? ''}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>网站域名：</th>
                    <td>
                        <input type="text" class="lg" name="domain" value="{{$info['domain'] ?? ''}}">
                    </td>
                </tr>
                <tr>
                    <th>网站状态：</th>
                    <td>
                        <label><input type="radio" @if($info['is_open']==1) checked @endif name="is_open" value="1">开启</label>
                        <label><input type="radio" @if($info['is_open']==0) checked @endif  name="is_open" value="0">关闭</label>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>系统公告：</th>
                    <td>
                        <textarea class="lg" name="announcement">{{$info['announcement'] ?? ''}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th><i class="">*</i>统计代码：</th>
                    <td>
                        <textarea class="lg" name="code">{{$info['code'] ?? ''}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection