@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 信息管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>帖子详情</h3>
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
    <!--结果集标题与导航组件 结束-->

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
@endsection



{{--<form method="post" action="{{url('admin/menu/'.$info->id)}}">--}}
    {{--<input type="hidden" name="_method" value="put">--}}
    {{--{{csrf_field()}}--}}
    {{--<table class="add_tab">--}}
        {{--<tbody>--}}
        {{--<tr>--}}
            {{--<th width="120"><i class="require">*</i>公司名：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="name" value="{{$info->com_name}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>标题：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="url" value="{{$info->com_title}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>作者：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="url" value="{{$info->user_name}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>职位：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="url" value="{{$info->com_position}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>图片：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="url" value="{{$info->com_position}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>主题内容：</th>--}}
            {{--<td>--}}
                {{--<input type="text" name="url" value="{{$info->com_content}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>查看次数：</th>--}}
            {{--<td>--}}
                {{--<input type="text" readonly name="url" value="{{$info->com_view}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>是否置顶：</th>--}}
            {{--<td>--}}
                {{--<select name="display">--}}
                    {{--<option @if($info->com_isO=='1') selected @endif value="1">置顶</option>--}}
                    {{--<option @if($info->com_isO=='0') selected @endif value="0">取消置顶</option>--}}
                {{--</select>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th><i class="require">*</i>添加时间：</th>--}}
            {{--<td>--}}
                {{--<input type="text" readonly name="url" value="{{$info->com_time}}">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<th></th>--}}
            {{--<td>--}}
                {{--<input type="button" class="back" onclick="history.go(-1)" value="返回">--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
    {{--</table>--}}
{{--</form>--}}
