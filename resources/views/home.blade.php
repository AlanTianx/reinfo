@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">展示板</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    我的<a href="{{url('notepad')}}">记事本</a>
                        <hr />
                    <p style="color: #0F9100;">最新记事</p>
                </div>
                <div id="notepad" class="panel-body" style="text-align: center;"></div>
            </div>
        </div>
    </div>
    <script>
        window.onload=function () {
            AjaxGetnotepad();
        };
        function AjaxGetnotepad() {
            $.get(
                '{{url('/ajaxgetnotepad/')}}',
                "{'_token':'{{csrf_token()}}",
                function (msg) {
                    if(msg.status == 'success'){
                        var Infos = '';
                        if(msg.list.length<=0){
                            Infos = '<p>您暂时没有记事集，您可以点击<a href="{{url("notepad/create")}}">记事本</a>制作记事集</p>';
                        }else {
                            for (var i=0;i < msg.list.length; i++){
                                Infos += "<h3>"+msg.list[i].title+"</h3><span>时间："+msg.list[i].addtime+"</span><p>"+msg.list[i].content+"</p>";
                            }
                        }
                        $('#notepad').html(Infos);
                    }
                }
            );
        }
    </script>
</div>
@endsection
