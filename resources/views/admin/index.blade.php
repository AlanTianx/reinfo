@extends('layouts.admin')
@section('content')
			<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">Reinfo后台管理</div>
			<ul>
				<li><a href="{{url('/')}}" class="active">前台首页</a></li>
				<li><a href="{{url('admin/index')}}">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：{{session('user.us_name')}}</li>
				<li><a href="{{url('admin/upd_pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/logout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			@foreach($menuinfo as $k => $v)
				@if($v->fid==0)
				<li>
					<h3><i class="fa fa-fw fa-clipboard"></i>{{$v->name}}</h3>
					@foreach($menuinfo as $value)
						@if($value->fid==$v->id)
						<ul class="sub_menu">
							<li><a href="{{url($value->url)}}" target="main"><i class="fa fa-fw"></i>{{$value->name}}</a></li>
						</ul>
						@endif
					@endforeach
				</li>
				@endif
			@endforeach
		</ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="{{url('/')}}">http://www.reinfo.com</a>.
	</div>
	<!--底部 结束-->
@endsection

