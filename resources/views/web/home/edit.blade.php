@extends('layouts.app')

@section('content')
    <!-- Styles Script -->
    <link rel="stylesheet" href="{{url('web/home/css/add.css')}}">
    <script type="text/javascript" src="{{ asset('web/home/js/add.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        我的记事录
                        <a style="margin-left: 550px" href="javascript:void(0)" onclick="history.go(-1)">Back</a>
                    </div>
                    <div class="formDate">
                        @if(count($errors)>0)
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p style="color:red">{{$error}}</p>
                                @endforeach
                            @else
                                <p style="color:red">{{$errors}}</p>
                            @endif
                        @endif
                        <form method="post" action="{{url('notepad/'.$info->id)}}" name="myForm">
                            <input type="hidden" name="_method" value="put">
                            {{csrf_field()}}
                            <div class="noptitle">
                                <input type="text" value="{{$info->title}}" name="title" maxlength="10" id="noptitle" placeholder="标题" />
                            </div>
                            <div class="noppub">
                                公开<input type="checkbox" {{$info->status == 1 ? 'checked' : ''}} name="status" id="noppub" value="1" />
                            </div>
                            <div class="nopcontent" id="nopcontent">
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[0])?$info->content[0]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[1])?$info->content[1]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[2])?$info->content[2]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[3])?$info->content[3]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[4])?$info->content[4]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[5])?$info->content[5]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[6])?$info->content[6]:''}}"/></p>
                                <p><input type="text" name="content[]" maxlength="40" value="{{isset($info->content[7])?$info->content[7]:''}}"/></p>
                            </div>
                            <div class="submit">
                                <input type="submit" value="保存">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
