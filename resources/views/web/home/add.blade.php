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
                        <form method="post" action="{{url('notepad/')}}" name="myForm">
                            {{csrf_field()}}
                            <div class="noptitle">
                                <input type="text" value="" name="title" maxlength="10" id="noptitle" placeholder="标题" />
                            </div>
                            <div class="noppub">
                                公开<input type="checkbox" name="status" id="noppub" value="1" />
                            </div>
                            <div class="nopcontent" id="nopcontent">
                                <p><input type="text" name="content[]" maxlength="40" /></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
                                <p><input type="text" name="content[]" maxlength="40"/></p>
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
