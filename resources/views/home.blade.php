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
                </div>
                <div id="notepad" class="panel-body">
                    sss
                </div>
            </div>
        </div>
    </div>
    <script>
        function AjaxGetnotepad() {

        }
    </script>
</div>
@endsection
