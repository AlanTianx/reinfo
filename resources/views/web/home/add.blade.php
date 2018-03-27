@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        我的记事录
                        <a style="margin-left: 550px" href="{{url('notepad/create')}}"><i class="fa fa-pencil"></i> </a>
                    </div>
                    <div class="">
                        <form method="post" action="{{url('notepad/')}}">
                            <table>
                                {{csrf_field()}}
                                <tr>
                                    <th>title</th>
                                    <td><input type="text" name="title" value=""></td>
                                </tr>
                                <tr>
                                    <th>content</th>
                                    <td>
                                        <textarea>

                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>设为私密记事</th>
                                    <td>
                                        <input type="checkbox" name="status" value="1">
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
