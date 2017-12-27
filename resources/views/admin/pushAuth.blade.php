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
            <h3>分配权限</h3>
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

    <div class="result_wrap">

        <form method="post" action="{{url('admin/pushAuth/'.$info->us_id)}}">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                {{--<tr>--}}
                    {{--<th><i class="require">*</i>选择：</th>--}}
                    {{--<td>--}}
                        {{--<select name="pid">--}}
                            {{--<option value="0">==顶级权限组==</option>--}}
                            {{--@foreach($data as $v)--}}
                                {{--<option value="{{$v->id}}" @if($info->pid==$v->id) selected @endif>{{$v->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <th width="120"><i class="require">*</i>用户名：</th>
                    <td>
                        <input type="text" name="us_name" value="{{isset($info->us_name)?$info->us_name:''}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>权限选定：</th>
                    <td>
                        @foreach($list as $v)
                            <label><input name="auth_id[]" @if(in_array($v->id,explode(',',isset($info->auth_id)?$info->auth_id:''))) checked="checked" @endif type="checkbox" value="{{$v->id}}">{{$v->name}}</label>
                        @endforeach
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

