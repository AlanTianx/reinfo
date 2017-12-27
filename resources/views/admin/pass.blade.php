@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改密码
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>修改密码</h3>
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

        <form method="post" action="" onsubmit="return check()">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>原密码：</th>
                    <td>
                        <input type="password" name="password_o"> </i>请输入原始密码</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>新密码：</th>
                    <td>
                        <input type="password" name="password" id="new_pass"> </i>新密码6-20位</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>确认密码：</th>
                    <td>
                        <input type="password" name="password_c" id="new_pass2"> </i>再次输入密码</span>
                    </td>
                    <script>
                        function check(){
                            var pass1 = $('#new_pass').val();
                            var pass2 = $('#new_pass2').val();
                            if(pass1.length<6||pass1.length>12){
                                layer.msg('密码长度在6-12之间',{icon:5});
                                //alert('密码长度在6-12之间');
                                return false;
                            }
                            if (pass1==pass2){
                                return true;
                            }else {
                                layer.msg('请保持密码一致',{icon:5});
                                return false;
                            }
                        }
                    </script>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交" onclick="re()">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection

