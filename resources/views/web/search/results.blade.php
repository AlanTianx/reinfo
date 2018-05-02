@extends('layouts.app')
@section('content')
    <!-- Styles Script-->
    <link rel="stylesheet" href="{{url('web/search/css/index.css')}}">
    <link rel="stylesheet" href="{{url('web/search/css/re.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="position: absolute;left: -23%">
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
                                <a href="{{url('info/'.$v->com_id)}}">{{$v->com_name}}</a>
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
                </div>
                <div class="panel panel-default" style="width: 50%;position: absolute;right: -23%">
                    <div class="panel-heading">热点推荐</div>
                    <ol id="recommended" class="list-content"></ol>
                    <script>
                        window.onload = function () {
                            Ajaxrecommended();
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
                        function Ajaxrecommended() {
                            $.get(
                                '{{url('/ajaxgetpush')}}',
                                "{'_token':'{{csrf_token()}}",
                                function (data) {
                                    if(data.code == 200){
                                        var recommended = $('#recommended');
                                        const list = data.list;
                                        var html_str = '<div class="info">';
                                        if(list.length == 0) {
                                            html_str += '暂无推荐内容';
                                        }
                                        for (var i = 0; i < list.length; i++) {
                                            html_str += '<div class="finfo">' +
                                                        '<div>' +
                                                            '<h3>' + list[i].cate_name + '</h3>';
                                            if(list[i].list.length == 0) {
                                                html_str += '<p>暂无推荐内容</p>';
                                            }
                                            for (var j = 0; j < list[i].list.length; j++) {
                                                html_str += '<a href="{{url('/info')}}/'+list[i].list[j].com_id+'">' + list[i].list[j].com_title + '</a>' +
                                                    '            <div>' +
                                                    '                <em>招聘职位：</em>' + list[i].list[j].com_position +
                                                    '            </div>';
                                            }
                                            html_str += '</div>';
                                            if(list[i]['z'].length == 0) {
                                                html_str += '<h4>暂无子分类</h4>';
                                            }
                                            for (var k = 0; k < list[i]['z'].length; k++) {
                                                html_str += '<div class="zinfo">' +
                                                    '            <h4>' + list[i]['z'][k].cate_name + '</h4>';
                                                if(list[i]['z'][k]['list'].length == 0) {
                                                    html_str += '<p>暂无推荐内容</p>';
                                                }
                                                for (var m = 0; m < list[i]['z'][k]['list'].length; m++) {
                                                    html_str += '<a href="{{url('/info')}}/'+list[i]['z'][k]['list'][m].com_id+'">' + list[i]['z'][k]['list'][m].com_title + '</a>' +
                                                        '            <div>' +
                                                        '                <em>招聘职位：</em>' + list[i]['z'][k]['list'][m].com_position +
                                                        '            </div>';
                                                }
                                                html_str += '</div>';
                                            }
                                            html_str += '</div>';
                                        }
                                        html_str += '</div>';
                                        recommended.html(html_str);
                                    }
                                }
                            );
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
