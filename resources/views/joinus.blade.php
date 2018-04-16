@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if(isset($info))
                        <div class="panel-heading">申请信息：</div>
                    @else
                        <div class="panel-heading">请认真填写以下信息</div>
                    @endif
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div style="margin-left: 45px;width: 500px;word-wrap:break-word">
                        @if (count($errors) > 0)
                            @if (is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p style="color:red">{{$error}}</p>
                                @endforeach
                            @else
                                <p style="color:red">{{$errors}}</p>
                            @endif
                        @endif
                        @if (isset($info) && (strtotime($info->addtime) + strtotime("+3 week") > time()))
                            @if($info->status == 1)
                                <div>
                                    <p>您已经成功成为本站的管理员！无需重复申请！</p>
                                    <p>为了让更多同学找到一份满意的工作！让我们共同努力！</p>
                                </div>
                                    <div>
                                        <p>申请人：{{$info->name}}</p>
                                        <p>申请电话：{{$info->tel}}</p>
                                        <p>申请理由：{{$info->reason}}</p>
                                        <p>申请时间：{{$info->addtime}}</p>
                                    </div>
                            @endif
                            @if($info->status == 0)
                                <div>
                                    <p>您已经申请过了，我们会在15个工作日内打电话联系您！请静候佳音!</p>
                                </div>
                                <div>
                                    <p>申请人：{{$info->name}}</p>
                                    <p>申请电话：{{$info->tel}}</p>
                                    <p>申请理由：{{$info->reason}}</p>
                                    <p>申请时间：{{$info->addtime}}</p>
                                </div>
                            @endif
                            @if($info->status == 2 && (strtotime($info->addtime) + strtotime("+3 week") > time()))
                                <div>
                                    <p>再次申请需要间隔3周时间方可！</p>
                                    <div>
                                        <p>申请人：{{$info->name}}</p>
                                        <p>申请电话：{{$info->tel}}</p>
                                        <p>申请理由：{{$info->reason}}</p>
                                        <p>申请时间：{{$info->addtime}}</p>
                                    </div>
                                </div>
                            @endif
                        @else
                            <form method="post" action="{{ url('joinus') }}">
                                {{csrf_field()}}
                                <div>
                                    <label>
                                        姓名：
                                    </label>
                                    <input name="name" value="">
                                    <i>请输入真实姓名</i>
                                </div>
                                <div>
                                    <label>
                                        电话：
                                    </label>
                                    <input name="tel" value="">
                                    <i>请输入有效电话</i>
                                </div>
                                <div>
                                    <label>
                                        理由：
                                    </label>
                                    <input name="reason" value="">
                                    <i>请简单描述申请理由</i>
                                </div>
                                <div>
                                    <label>
                                        验证码：
                                    </label>
                                    <input type="text" name="vf_code"/>
                                    <img src="{{url('admin/vf_code')}}" alt="vf_code" onclick="this.src ='{{url('vf_code')}}?'+Math.random()">
                                </div>
                                <div>
                                    <label>
                                    </label>
                                    <input type="submit" value="确定申请">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
