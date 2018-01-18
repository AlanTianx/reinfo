@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 帖子管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>新增帖子</h3>
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
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/company')}}"><i class="fa fa-list-ul"></i>帖子列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/company')}}" method="post">
            <table class="add_tab">
                <tbody>
                {{csrf_field()}}
                <tr>
                    <th>公司名称：</th>
                    <td>
                        <input type="text" class="lg" name="com_name">
                    </td>
                </tr>
                <tr>
                    <th width="120"><i class="require">*</i>公司分类：</th>
                    <td>
                        <select name="com_type_id">
                            <option value="0">==选择分类==</option>
                            @foreach($data as $v)
                                <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>标题：</th>
                    <td>
                        <input type="text" class="lg" name="com_title">
                    </td>
                </tr>
                <tr>
                    <th>招聘职位：</th>
                    <td>
                        <input type="text" class="lg" name="com_position">
                    </td>
                </tr>
                <tr>
                    <th>图片证据：</th>
                    <td>
                        <input name="com_img" type="text" id="thumb">
                        <input id="file_upload" type="file">
                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
                        <a href="javascript:;" onclick="upload_img()">upload</a>
                    </td>
                </tr>
                <tr>
                    <th>预览：</th>
                    <td>
                        <img src="" id="up_img" style="max-height: 100px;max-width: 350px" alt="暂无上传">
                    </td>
                </tr>
                <script>
                    function upload_img(){
                        var data = new FormData();
                        var token = $("#token").val();
                        var file = document.getElementById('file_upload').files[0];
                        data.append('myfile',file);
                        data.append('_token', token);
                        $.ajax({
                            {{--headers: { 'X-CSRF-TOKEN' : '{{csrf_token()}}' },--}}
                            url : '{{url('upload')}}',
                            type : 'post',
                            data : data,
                            cache : false,
                            contentType : false,
                            processData : false,
                            dataType : 'json',
                            success : function(data) {
                                if(data.status=='1'){
                                    alert('upload success');
                                    var p = data.file_path;
                                    $('#thumb').val(p);
                                    $('#up_img').attr('src','/uploads/'+p)
                                }
                            },
                            error : function (data) {
                                if(data.status=='0'){
                                    alert('upload failed');
                                }
                            }
                        })
                    }
                </script>
                <tr>
                    <th>主题内容：</th>
                    <td>
                        <script id="editor" name="com_content" type="text/plain" style="width:820px;height:300px;"></script>
                        <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
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