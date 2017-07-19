<!DOCTYPE html>
<html>
<head>
<title>{{config('web.web_title')}}</title>
<link href="{{asset('home')}}/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('home')}}/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="{{asset('home')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- for bootstrap working -->
	<script type="text/javascript" src="{{asset('home')}}/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- web-fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="{{asset('home')}}/js/responsiveslides.min.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		  });
		});
	</script>
	<script type="text/javascript" src="{{asset('home')}}/js/move-top.js"></script>
<script type="text/javascript" src="{{asset('home')}}/js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
<body>
	<!-- header-section-starts-here -->
	<div class="header">


		<div class="header-bottom">

			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
		   <div class="wrap">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!--/.navbar-header-->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">

					 {{--<li class="active"><a href="{{url('home/info')}}"></a></li>--}}
					@if(session('user_home'))
					@foreach ($nav as $k => $v)
							<li><a href="{{url($v->nav_url)}}">{{$v->nav_name}}</a></li>
						@endforeach
					@else
					<li><a href="{{url('home/zhuce/add')}}">注册</a></li>
					<li><a href="{{url('home/login/login')}}">登录</a></li>
					@endif
		<div class="clearfix"></div>
				</ul>

					<div class="clearfix"></div>
				</div>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->


		</nav>
		</div>

	</div>
	<!-- header-section-ends-here -->

  <!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
	@section('main-body')

	@show
			<div class="col-md-4 side-bar">
			<div class="first_half">

				{{--<div class="list_vertical">--}}
		         	 	{{--<section class="accordation_menu">--}}
						  {{--<div>--}}
						    {{--<input id="label-1" name="lida" type="radio" checked/>--}}
						   {{--<label for="label-1" id="item1"><i class="ferme"> </i>热门企业<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>--}}
						    {{--<div class="content" id="a1">--}}
						    	{{--<div class="scrollbar" id="style-2">--}}
								 {{--<div class="force-overflow">--}}
									{{--<div class="popular-post-grids">--}}
										{{--<div class="popular-post-grid">--}}
											{{--<div class="post-img">--}}
												{{--<a href="single.html"><img src="{{asset('home')}}/images/bus2.jpg" alt="" /></a>--}}
											{{--</div>--}}
											{{--<div class="post-text">--}}
												{{--<a class="pp-title" href="single.html"> The section of the mass media industry</a>--}}
												{{--<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
											{{--</div>--}}
											{{--<div class="clearfix"></div>--}}
										{{--</div>--}}
										{{--<div class="popular-post-grid">--}}
											{{--<div class="post-img">--}}
												{{--<a href="single.html"><img src="{{asset('home')}}/images/bus1.jpg" alt="" /></a>--}}
											{{--</div>--}}
											{{--<div class="post-text">--}}
												{{--<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>--}}
												{{--<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
											{{--</div>--}}
											{{--<div class="clearfix"></div>--}}
										{{--</div>--}}
										{{--<div class="popular-post-grid">--}}
											{{--<div class="post-img">--}}
												{{--<a href="single.html"><img src="{{asset('home')}}/images/bus3.jpg" alt="" /></a>--}}
											{{--</div>--}}
											{{--<div class="post-text">--}}
												{{--<a class="pp-title" href="single.html">There are many variations of Lorem</a>--}}
												{{--<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
											{{--</div>--}}
											{{--<div class="clearfix"></div>--}}
										{{--</div>--}}
										{{--<div class="popular-post-grid">--}}
											{{--<div class="post-img">--}}
												{{--<a href="single.html"><img src="{{asset('home')}}/images/bus4.jpg" alt="" /></a>--}}
											{{--</div>--}}
											{{--<div class="post-text">--}}
												{{--<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>--}}
												{{--<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
											{{--</div>--}}
											{{--<div class="clearfix"></div>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{--</div>--}}
                                {{--</div>--}}
                              {{--</div>--}}
						  {{--</div>--}}
						  {{--<div>--}}
						    {{--<input id="label-2" name="lida" type="radio"/>--}}
						    {{--<label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>大V排行<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>--}}
						    {{--<div class="content" id="a2">--}}
						       {{--<div class="scrollbar" id="style-2">--}}
								   {{--<div class="force-overflow">--}}
									{{--<div class="popular-post-grids">--}}
											{{--<div class="popular-post-grid">--}}
												{{--<div class="post-img">--}}
													{{--<a href="single.html"><img src="{{asset('home')}}/images/tec2.jpg" alt="" /></a>--}}
												{{--</div>--}}
												{{--<div class="post-text">--}}
													{{--<a class="pp-title" href="single.html"> The section of the mass media industry</a>--}}
													{{--<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
												{{--</div>--}}
												{{--<div class="clearfix"></div>--}}
											{{--</div>--}}
											{{--<div class="popular-post-grid">--}}
												{{--<div class="post-img">--}}
													{{--<a href="single.html"><img src="{{asset('home')}}/images/tec1.jpg" alt="" /></a>--}}
												{{--</div>--}}
												{{--<div class="post-text">--}}
													{{--<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>--}}
													{{--<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
												{{--</div>--}}
												{{--<div class="clearfix"></div>--}}
											{{--</div>--}}
											{{--<div class="popular-post-grid">--}}
												{{--<div class="post-img">--}}
													{{--<a href="single.html"><img src="{{asset('home')}}/images/tec3.jpg" alt="" /></a>--}}
												{{--</div>--}}
												{{--<div class="post-text">--}}
													{{--<a class="pp-title" href="single.html">There are many variations of Lorem</a>--}}
													{{--<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
												{{--</div>--}}
												{{--<div class="clearfix"></div>--}}
											{{--</div>--}}
											{{--<div class="popular-post-grid">--}}
												{{--<div class="post-img">--}}
													{{--<a href="single.html"><img src="{{asset('home')}}/images/tec4.jpg" alt="" /></a>--}}
												{{--</div>--}}
												{{--<div class="post-text">--}}
													{{--<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>--}}
													{{--<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>--}}
												{{--</div>--}}
												{{--<div class="clearfix"></div>--}}
											{{--</div>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
						    {{--</div>--}}
						  {{--</div>--}}
						  {{--<div>--}}
						    {{--<input id="label-3" name="lida" type="radio"/>--}}
						    {{--<label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i><i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>--}}
						    {{--<div class="content" id="a3">--}}
						       {{--<div class="scrollbar" id="style-2">--}}
							    {{--<div class="force-overflow">--}}
								 {{--<div class="response">--}}
									 {{--@foreach($pic5 as $kk=>$vv)--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">{{$vv->username}}</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>{{$vv->ad_brief}}</p>--}}
								{{--<ul>--}}
									{{--<li>{{date('Y-m-d',$vv->ad_ctime)}}</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
									 {{--@endforeach--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>MARCH 26, 2015</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>MAY 25, 2015</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>FEB 13, 2015</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>JAN 28, 2015</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>APR 18, 2015</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
						{{--<div class="media response-info">--}}
							{{--<div class="media-left response-text-left">--}}
								{{--<a href="#">--}}
									{{--<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />--}}
								{{--</a>--}}
								{{--<h5><a href="#">Username</a></h5>--}}
							{{--</div>--}}
							{{--<div class="media-body response-text-right">--}}
								{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, --}}
									{{--sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
								{{--<ul>--}}
									{{--<li>DEC 25, 2014</li>--}}
									{{--<li><a href="single.html">Reply</a></li>--}}
								{{--</ul>		--}}
							{{--</div>--}}
							{{--<div class="clearfix"> </div>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--</div>--}}

                                {{--</div>--}}
						    {{--</div>--}}
						  {{--</div>--}}
						{{--</section>--}}
					 {{--</div>--}}
					 <div class="side-bar-articles">
						<div class="side-bar-article">
							<a href="https:\\www.baidu.com"><img src="{{$pic['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="https:\\www.baidu.com">{{$pic['ad_brief']}}</a>
							</div>
						</div>
						<div class="side-bar-article">
							<a href="https:\\www.baidu.com"><img src="{{$pic2['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="https:\\www.baidu.com">{{$pic2['ad_brief']}}</a>
							</div>
						</div>
						<div class="side-bar-article">
							<a href="https:\\www.baidu.com"><img src="{{$pic3['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="https:\\www.baidu.com">{{$pic3['ad_brief']}}</a>
							</div>
						</div>
					 </div>
					 </div>
					 <div class="secound_half">

					 <div class="popular-news">

					</div>
					</div>
					<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- content-section-ends-here -->
	<!-- footer-section-starts-here -->
	<div class="footer">
		<div class="footer-top">
			<div class="wrap">
				<div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
					<h4 class="footer-head">关于我们</h4>
					<p>{{config('web.about_us')}}</p>
					<p>{{config('web.about_us_en')}}</p>

				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">友情链接</h4>
					@foreach($links as $k=>$v)
					<ul class="cat">
						<li><a href="https:\\www.baidu.com" title="{{$v->link_title}}">{{$v->link_name}}</a></li>
					</ul>
					@endforeach
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">女神 高圆圆</h4>
					<ul class="flickr">
						@foreach($pic5 as $k=>$v)
						<li><a href="https:\\www.baidu.com"><img src="{{$v->ad_img}}"></a></li>
						@endforeach
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">联系我们</h4>
					<span class="hq">公司总部</span>
					<address>
						<ul class="location">
							<li><span class="glyphicon glyphicon-map-marker"></span></li>
							<li>{{config('web.address')}}</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-earphone"></span></li>
							<li>{{config('web.mobile')}}</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-envelope"></span></li>
							<li><a href="mailto:lisicong1982@163.com">{{config('web.email')}}</a></li>
							<div class="clearfix"></div>
						</ul>						
					</address>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copyrights col-md-6">
					<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a class="facebook" href="#"></a></li>
						<li><a class="twitter" href="#"></a></li>
						<li><a class="flickr" href="#"></a></li>
						<li><a class="googleplus" href="#"></a></li>
						<li><a class="dribbble" href="#"></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- footer-section-ends-here -->
	@section('js')
		@show
	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				wrapID: 'toTop', // fading element id
				wrapHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
</body>
</html>