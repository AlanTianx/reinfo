@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 权限组管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加权限组</h3>
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/adminauth')}}"><i class="fa fa-list-ul"></i>权限组列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/adminauth')}}" method="post">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                    <tr>
                        <th width="120"><i class="require">*</i>权限分组：</th>
                        <td>
                            <select name="pid">
                                <option value="0">==顶级权限组==</option>
                                @foreach($data as $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>权限(组)名：</th>
                        <td>
                            <input type="text" name="name">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <input type="text" class="lg" name="describe">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>访问授权：</th>
                        <td>
                        @foreach($list as $v)
                            <label><input name="route_list_id[]" type="checkbox" value="{{$v->id}}">{{$v->name}}</label>
                        @endforeach
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>访问授权：</th>--}}
                        {{--<td>--}}
                            {{--<select name="url">--}}
                                {{--<option value="0">选择</option>--}}
                                {{--@foreach($list as $v)--}}
                                    {{--<option value="{{$v->id}}">{{$v->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>分配到人：</th>--}}
                        {{--<td>--}}
                            {{--@foreach($adminList as $v)--}}
                                {{--<label><input name="us_id[]" type="checkbox" value="{{$v->us_id}}">{{$v->us_name}}</label>--}}
                            {{--@endforeach--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>分配到人：</th>--}}
                        {{--<td>--}}
                            {{--<select name="us_id">--}}
                                {{--<option value="0">选择</option>--}}
                                {{--@foreach($adminList as $v)--}}
                                    {{--<option value="{{$v->us_id}}">{{$v->us_name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
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