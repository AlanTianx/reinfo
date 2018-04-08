@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/search/css/index.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="position: absolute;left: -180px">
                    <div class="panel-heading">
                        <div>
                            <form action="{{url('search')}}" method="get">
                                <span class="s_ipt_wr"><input type="text" id="keywords" name="keywords" value="{{$keywords['keywords']}}" autocomplete="off" class="s_ipt"></span>
                                <span class="s_btn_wr"><input type="submit" value="甄别一下" id="su" class="s_but"></span>
                                <div class="s_hd"></div>
                            </form>
                        </div>
                    </div>
                    <ol class="list-content">
                        @if($list->total()===0)
                            <div style="text-indent: 20px">暂无结果，欢迎您来补充！</div>
                        @endif
                        @foreach($list as $v)
                            <h3>
                                <a href="{{url('')}}">{{$v->com_name}}</a>
                            </h3>
                            <div>
                                <em style="color: #9DB832">招聘职位：</em>{!! $v->com_position !!}
                            </div>
                        @endforeach
                    </ol>
                    <div class="page_list">
                        <ul>
                            {{$list->links()}}
                        </ul>
                    </div>
                    <script>
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
                                            str += '<a href="{{url('')}}">'+data.list[i].com_name+'</a>';
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
                </div>
            </div>
        </div>
    </div>
@endsection
