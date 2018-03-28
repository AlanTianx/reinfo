@extends('layouts.app')

@section('content')
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('web/home/css/add.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        我的记事录
                        <a style="margin-left: 550px" href="{{url('notepad/create')}}"><i class="fa fa-pencil"></i> </a>
                    </div>
                    <div class="formDate">
                        <form method="post" action="{{url('notepad/')}}">
                            <table>
                                {{csrf_field()}}
                                <tr>
                                    <td><input type="text" id="title" name="title" value=""></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="status" name="status" title="隐私" value="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea id="content" name="content"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input id="submit" type="submit" value="保存">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
