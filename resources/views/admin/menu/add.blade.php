@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 菜单维护
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加菜单</h3>
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

        <form method="post" action="{{url('admin/menu')}}">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>选择：</th>
                    <td>
                        <select name="fid">
                            <option value="0">顶级菜单</option>
                            @foreach($list as $v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="120"><i class="require">*</i>菜单名：</th>
                    <td>
                        <input type="text" name="name">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>url：</th>
                    <td>
                        <input type="text" name="url" value="">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>是否显示：</th>
                    <td>
                        <select name="display">
                            <option value="1">显示</option>
                            <option value="0">隐藏</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>排序：</th>
                    <td>
                        <input type="text" class="sm" name="order">
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

