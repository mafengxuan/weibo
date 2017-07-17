<!DOCTYPE html>
<html>
<head>
<title>lamp182-weibo</title>
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
		<div class="header-top">
			<div class="wrap">
				<div class="top-menu">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="privacy-policy.html">Privacy Policy</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>

				@if(session('user_home'))
					<div class="num">
						<a href="{{url('home/info')}}">个人中心</a>
						<a href="{{url('home/quit')}}">退出</a>
					</div>
				@else
					<div class="num">
						<a href="{{url('home/zhuce/add')}}">注册</a>
						<a href="{{url('home/login/login')}}">登录</a>
					</div>
				@endif
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="logo text-center">
				<a href="index.html"><img src="{{asset('home')}}/images/logo.jpg" alt="" /></a>
			</div>
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
					 <li class="active"><a href="index.html">Home</a></li>
						<li><a href="sports.html">Sports</a></li>
				    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entertainment<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="entertainment.html">Movies</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">Another action</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">Articles</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">celebrity</a></li>
							<li class="divider"></li>
							<li><a href="entertainment.html">One more separated link</a></li>
						</ul>
					  </li>
					<li><a href="shortcodes.html">Health</a></li>
					<li><a href="fashion.html">Fashion</a></li>
					  <li class="dropdown">
						<a href="business.html" class="dropdown-toggle" data-toggle="dropdown">Business<b class="caret"></b></a>
						<ul class="dropdown-menu multi-column columns-2">
							<div class="row">
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
										<li><a href="business.html">Action</a></li>
										<li class="divider"></li>
										<li><a href="business.html">bulls</a></li>
									    <li class="divider"></li>
										<li><a href="business.html">markets</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Reviews</a></li>
										<li class="divider"></li>
										<li><a href="shortcodes.html">Short codes</a></li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="multi-column-dropdown">
									   <li><a href="business.html">features</a></li>	
										<li class="divider"></li>
										<li><a href="entertainment.html">Movies</a></li>
									    <li class="divider"></li>
										<li><a href="sports.html">sports</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Reviews</a></li>
										<li class="divider"></li>
										<li><a href="business.html">Stock</a></li>
									</ul>
								</div>
							</div>
						</ul>
					</li>
					<li><a href="technology.html">Technology</a></li>
					<div class="clearfix"></div>
				</ul>
				<div class="search">
					<!-- start search-->
				    <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="{{asset('home')}}/js/classie.js"></script>
					<script src="{{asset('home')}}/js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->
			</div>
		</nav>
		</div>
	</div>
	<!-- header-section-ends-here -->
	<div class="wrap">
		<div class="move-text">
			<div class="breaking_news">
				<h2>今日热点</h2>
			</div>
			<div class="marquee">
				<div class="marquee1"><a class="breaking" href="single.html">>>The standard chunk of Lorem Ipsum used since the 1500s is reproduced..</a></div>
				<div class="marquee2"><a class="breaking" href="single.html">>>At vero eos et accusamus et iusto qui blanditiis praesentium voluptatum deleniti atque..</a></div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<script type="text/javascript" src="{{asset('home')}}/js/jquery.marquee.min.js"></script>
			<script>
			  $('.marquee').marquee({ pauseOnHover: true });
			  //@ sourceURL=pen.js
			</script>
		</div>
	</div>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
	@section('main-body')

	@show
			<div class="col-md-4 side-bar">
			<div class="first_half">
				<div class="newsletter">
					<h1 class="side-title-head">微博搜索<a href="{{url('/home/microblog')}}" style="float:right">发布微博</a></h1>
					<p class="sign">Sign up to receive our free newsletters!</p>
					<form>
						<input type="text" class="text" value="Email Address" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email Address';}">
						<input type="submit" value="搜索">
					</form>
				</div>
				<div class="list_vertical">
		         	 	<section class="accordation_menu">
						  <div>
						    <input id="label-1" name="lida" type="radio" checked/>
						   <label for="label-1" id="item1"><i class="ferme"> </i>热门企业<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a1">
						    	<div class="scrollbar" id="style-2">
								 <div class="force-overflow">
									<div class="popular-post-grids">
										<div class="popular-post-grid">
											<div class="post-img">
												<a href="single.html"><img src="{{asset('home')}}/images/bus2.jpg" alt="" /></a>
											</div>
											<div class="post-text">
												<a class="pp-title" href="single.html"> The section of the mass media industry</a>
												<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-img">
												<a href="single.html"><img src="{{asset('home')}}/images/bus1.jpg" alt="" /></a>
											</div>
											<div class="post-text">
												<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>
												<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-img">
												<a href="single.html"><img src="{{asset('home')}}/images/bus3.jpg" alt="" /></a>
											</div>
											<div class="post-text">
												<a class="pp-title" href="single.html">There are many variations of Lorem</a>
												<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="popular-post-grid">
											<div class="post-img">
												<a href="single.html"><img src="{{asset('home')}}/images/bus4.jpg" alt="" /></a>
											</div>
											<div class="post-text">
												<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>
												<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									</div>
                                </div>
                              </div>
						  </div>
						  <div>
						    <input id="label-2" name="lida" type="radio"/>
						    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>大V排行<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a2">
						       <div class="scrollbar" id="style-2">
								   <div class="force-overflow">
									<div class="popular-post-grids">
											<div class="popular-post-grid">
												<div class="post-img">
													<a href="single.html"><img src="{{asset('home')}}/images/tec2.jpg" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="single.html"> The section of the mass media industry</a>
													<p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="popular-post-grid">
												<div class="post-img">
													<a href="single.html"><img src="{{asset('home')}}/images/tec1.jpg" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="single.html"> Lorem Ipsum is simply dummy text printing</a>
													<p>On Apr 14 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>2 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="popular-post-grid">
												<div class="post-img">
													<a href="single.html"><img src="{{asset('home')}}/images/tec3.jpg" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="single.html">There are many variations of Lorem</a>
													<p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="popular-post-grid">
												<div class="post-img">
													<a href="single.html"><img src="{{asset('home')}}/images/tec4.jpg" alt="" /></a>
												</div>
												<div class="post-text">
													<a class="pp-title" href="single.html">Sed ut perspiciatis unde omnis iste natus</a>
													<p>On Jan 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>1 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
						    </div>
						  </div>
						  <div>
						    <input id="label-3" name="lida" type="radio"/>
						    <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>广告排行<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
						    <div class="content" id="a3">
						       <div class="scrollbar" id="style-2">
							    <div class="force-overflow">
								 <div class="response">
									 @foreach($pic5 as $kk=>$vv)
						<div class="media response-info">
							<div class="media-left response-text-left">
								<a href="#">
									<img class="media-object" src="{{asset('home')}}/images/icon1.png" alt="" />
								</a>
								<h5><a href="#">{{$vv->username}}</a></h5>
							</div>
							<div class="media-body response-text-right">
								<p>{{$vv->ad_brief}}</p>
								<ul>
									<li>{{date('Y-m-d',$vv->ad_ctime)}}</li>
									<li><a href="single.html">Reply</a></li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
									 @endforeach
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
					</div>
					</div>

                                </div>
						    </div>
						  </div>
						</section>
					 </div>
					 <div class="side-bar-articles">
						<div class="side-bar-article">
							<a href="single.html"><img src="{{$pic['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="single.html">{{$pic['ad_brief']}}</a>
							</div>
						</div>
						<div class="side-bar-article">
							<a href="single.html"><img src="{{$pic2['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="single.html">{{$pic2['ad_brief']}}</a>
							</div>
						</div>
						<div class="side-bar-article">
							<a href="single.html"><img src="{{$pic3['ad_img']}}" alt="" /></a>
							<div class="side-bar-article-title">
								<a href="single.html">{{$pic3['ad_brief']}}</a>
							</div>
						</div>
					 </div>
					 </div>
					 <div class="secound_half">
					 <div class="tags">
						<header>
							<h3 class="title-head">标签</h3>
						</header>
						<p>
						<a class="tag1" href="single.html">At vero eos</a>
						<a class="tag2" href="single.html">doloremque</a>
						<a class="tag3" href="single.html">On the other</a>
						<a class="tag4" href="single.html">pain was</a>
						<a class="tag5" href="single.html">rationally encounter</a>
						<a class="tag6" href="single.html">praesentium voluptatum</a>
						<a class="tag7" href="single.html">est, omnis</a>
						<a class="tag8" href="single.html">who are so beguiled</a>
						<a class="tag9" href="single.html">when nothing</a>
						<a class="tag10" href="single.html">owing to the</a>
						<a class="tag11" href="single.html">pains to avoid</a>
						<a class="tag12" href="single.html">tempora incidunt</a>
						<a class="tag13" href="single.html">pursues or desires</a>
						<a class="tag14" href="single.html">Bonorum et</a>
						<a class="tag15" href="single.html">written by Cicero</a>
						<a class="tag16" href="single.html">Ipsum passage</a>
						<a class="tag17" href="single.html">exercitationem ullam</a>
						<a class="tag18" href="single.html">mistaken idea</a>
						<a class="tag19" href="single.html">ducimus qui</a>
						<a class="tag20" href="single.html">holds in these</a>
						</p>
					 </div>					 
					 <div class="popular-news">
						<header>
							<h3 class="title-popular">好友动态</h3>
						</header>
						 @foreach ($data as $k => $v)
							<div class="popular-grids">
							<div class="popular-grid">
								<a class="title" href="single.html">{!!str_limit($v->content, $limit = 20, $end = '...')!!}</a>
								<p>{!!date('Y-m-d H:i:s',($v->ctime))!!}
									<a class="span_link" >
										<span class="glyphicon glyphicon-comment" onclick="fun()"></span>{!! $v->c_count!!}
									</a>

									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-eye-open"></span>{!! $v->mcount!!}
									</a>
									<a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up">
										</span>{!!$v->p_count!!}
									</a>
									<p id="input" style="display:none">
									<input  type="text" class="form-control" ><br>
									<button class="btn btn-primary">确认评论</button>
									</p>

								</p>
							</div>

							{{--<div class="popular-grid">--}}
								{{--<a href="single.html"><img src="{{asset('home')}}/images/popular-1.jpg" alt="" /></a>--}}
								{{--<a class="title" href="single.html">It is a long established fact that a reader will be distracted</a>--}}
								{{--<p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>--}}
							{{--</div>--}}
							{{--<div class="popular-grid">--}}
								{{--<iframe width="100%" src="http://www.cssmoban.com/" frameborder="0" allowfullscreen></iframe>--}}
								{{--<a class="title" href="single.html">Aishwarya Rai Bachchan's Latest SHOCKING News For Ex Salman Khan</a>--}}
								{{--<p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>--}}
							{{--</div>--}}
							{{--<div class="popular-grid">--}}
								{{--<a href="single.html"><img src="{{asset('home')}}/images/popular-3.jpg" alt="" /></a>--}}
								{{--<a class="title" href="single.html">It is a long established fact that a reader will be distracted</a>--}}
								{{--<p>On Mar 14, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>--}}
							{{--</div>--}}

						</div>
						 @endforeach
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
					<h4 class="footer-head">About Us</h4>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.</p>
				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">友情链接</h4>
					@foreach($links as $k=>$v)
					<ul class="cat">
						<li><a href="{{$v->link_url}}" title="{{$v->link_title}}">{{$v->link_name}}</a></li>
					</ul>
					@endforeach
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">Flickr Feed</h4>
					<ul class="flickr">
						<li><a href="#"><img src="{{asset('home')}}/images/bus4.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/bus2.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/bus3.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/tec4.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/tec2.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/tec3.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/bus2.jpg"></a></li>
						<li><a href="#"><img src="{{asset('home')}}/images/bus3.jpg"></a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">Contact Us</h4>
					<span class="hq">Our headquaters</span>
					<address>
						<ul class="location">
							<li><span class="glyphicon glyphicon-map-marker"></span></li>
							<li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-earphone"></span></li>
							<li>+0 561 111 235</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-envelope"></span></li>
							<li><a href="mailto:info@example.com">mail@example.com</a></li>
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