@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/search/css/index.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color: red">
                        系统公告：<span onclick="close_announcement(this)" style="display: block;float: right;font-size: 35px;margin-top: -31px;margin-right: -11px;cursor: pointer">×</span>
                    </div>
                    <ol class="list-content announcement">
                        {{$announcement}}
                    </ol>
                </div>
                <div>
                    <form action="{{url('search')}}" method="get">
                        <span class="s_ipt_wr"><input type="text" id="keywords" name="keywords" value="" autocomplete="off" class="s_ipt"></span>
                        <span class="s_btn_wr"><input type="submit" value="甄别一下" id="su" class="s_but"></span>
                        <div class="s_hd"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function close_announcement(e) {
            $(e).parent().parent().hide();
        }
        window.onload = function () {
            $('#keywords').bind('input propertychange', function() {
                var keywords = $(this).val();
                var data = {'keywords':keywords,'_token':'{{csrf_token()}}'};
                $.post('{{url('ajaxsearch')}}',data,function (data) {
                    if(data.code==200){
                        var str = '';
                        var s_hd = $('.s_hd');
                        var len = data.list.length;
                        var s_hd_height = 25*len;
                        for(var i=0; i<len; i++){
                            str += '<a href="{{url('info')}}/'+data.list[i].com_id+'">'+data.list[i].com_name+'</a>';
                        }
                        if(len>0){
                            s_hd.height(s_hd_height);
                            s_hd.html(str);
                            s_hd.show();
                        }else {
                            s_hd.hide();
                        }
                    }
                });
            });
        };
    </script>
@endsection
