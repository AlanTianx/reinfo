@extends('layouts.app')

@section('content')
    <!-- Styles Script -->
    <script type="text/javascript" charset="utf-8" src="{{asset('org/UEditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('org/UEditor/ueditor.all.min.js')}}"> </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="width: 120%">
                    <div class="panel-heading">
                        添加识别贡献
                    </div>
                    <div>
                        @if(count($errors)>0)
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p style="color:red;">{{$error}}</p>
                                @endforeach
                            @else
                                <p style="color:red">{{$errors}}</p>
                            @endif
                            <hr/>
                        @endif
                        <form action="{{url('comppush')}}" method="post" style="padding: 20px;">
                            <table class="add_tab">
                                <tbody>
                                {{csrf_field()}}
                                <tr>
                                    <th style="text-align: right;margin-bottom: 5px;">公司名称：</th>
                                    <td>
                                        <input type="text" class="" name="com_name" style="width: 60%;height: 30px;border-radius:5px;border: 1px solid #ccc;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th width="120"  style="text-align: right"><i class="">*</i>公司分类：</th>
                                    <td>
                                        <select name="com_type_id" style="border: 1px solid #ccc;height: 30px;border-radius:5px;">
                                            <option value="0">==选择分类==</option>
                                            @foreach($data as $v)
                                                <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th  style="text-align: right">标题：</th>
                                    <td>
                                        <input type="text" class="" name="com_title" style="width: 60%;height: 30px;border-radius:5px;border: 1px solid #ccc;">
                                    </td>

                                <tr>
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right">招聘职位：</th>
                                    <td>
                                        <input type="text" class="" name="com_position" style="width: 60%;height: 30px;border-radius:5px;border: 1px solid #ccc;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th  style="text-align: right">图片证据：</th>
                                    <td>
                                        <input name="com_img" type="text" id="thumb" style="display: inline-block;border-radius:5px;border: 1px solid #ccc;height: 30px;" autocomplete="off">
                                        <input id="file_upload" type="file" style="display: inline-block;height: 30px;">
                                        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}" style="display: inline-block;">
                                        <a href="javascript:;" onclick="upload_img()" style="display: inline-block;">upload</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th  style="text-align: right">预览：</th>
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
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th  style="text-align: right">主题内容：</th>
                                    <td>
                                        <script id="editor" name="com_content" type="text/plain" style="width:700px;height:300px;"></script>
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
                                    <td style="border: 10px solid white;"></td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <input type="submit" value="提交" style="line-height: 30px;border-radius: 5px;border: none;background: #ccc;height: 30px;width: 60px;">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
