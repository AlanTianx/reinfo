<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Reinfo</h1>
		<h2>信息管理平台</h2>
		<div class="form">
			@if(session('error'))
				<p style="color:red">{{session('error')}}</p>
			@endif
			<form action="{{route('a_login')}}" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="user_name" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="user_pass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="vf_code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('admin/vf_code')}}" alt="vf_code" onclick="this.src ='{{url('admin/vf_code')}}?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.houdunwang.com" target="_blank">http://www.houdunwang.com</a></p>
		</div>
	</div>
</body>
</html>