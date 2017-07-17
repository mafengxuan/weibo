@extends('home.layout.index')
@section('main-body')

			<div class="col-md-8 content-left">
				<div class="slider">
					<div class="callbacks_wrap">
						<ul class="rslides" id="slider">
							@foreach($pic4 as $k=>$v)
							<li>
								<img src="{{$v['ad_img']}}" alt="">
								<div class="caption">
									<a href="{{$v['ad_url']}}">{{$v['ad_brief']}}</a>
									{{--http://lamp182-weibo.oss-cn-beijing.aliyuncs.com/uploads/20170717/201707171501439715.jpg--}}
								</div>
							</li>
							@endforeach
							{{--<li>--}}
								{{--<img src="{{asset('home')}}/images/2.jpg" alt="">--}}
								{{--<div class="caption">--}}
									{{--<a href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</a>--}}
								{{--</div>--}}
							{{--</li>--}}
							{{--<li>--}}
								{{--<img src="{{asset('home')}}/images/1.jpg" alt="">--}}
								{{--<div class="caption">--}}
									{{--<a href="single.html">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</a>--}}
								{{--</div>--}}
							{{--</li>--}}
						</ul>
					</div>
				</div>
				<div class="articles">
					<header>
						<h3 class="title-head">实时微博</h3>
					</header>
					<div class="article">
						<div class="article-left">
							<a href="single.html"><img src="{{asset('home')}}/images/article1.jpg"></a>
						</div>
						<div class="article-right">
							<div class="article-title">
								<a class="title" href="single.html">用户昵称</a>
							</div>
							<div class="article-text">
								<p>微博内容</p>
								<p>On Feb 25, 2015
									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-share"></span>0
									</a>
									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-comment"></span>0
									</a>
									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-eye-open"></span>104
									</a>
									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-thumbs-up"></span>52
									</a>
								</p>

								<div class="clearfix"></div>
							</div>
							{{--评论内容--}}
							<div class="response">
								{{--<h4>Responses</h4>--}}
								<div class="media response-info">
									<div class="media-left response-text-left">
										<a href="#">
											<img class="media-object" src="{{asset('home')}}/images/c1.jpg" alt=""/>
										</a>
										<h5><a href="#">Username</a></h5>
									</div>
									<div class="media-body response-text-right">
										<p>评论内容</p>
										<ul>
											<li>Sep 21, 2015</li>
											<li><a href="single.html">Reply</a></li>
										</ul>
										<div class="media response-info">
											<div class="media-left response-text-left">

												<h5><a href="#">Username</a></h5>
											</div>
											<div class="media-body response-text-right">
												<p>回复内容</p>
												<ul>
													<li>July 17, 2015</li>
													<li><a href="single.html">Reply</a></li>
												</ul>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="media response-info">
											<div class="media-left response-text-left">

												<h5><a href="#">Username</a></h5>
											</div>
											<div class="media-body response-text-right">
												<p>回复内容</p>
												<ul>
													<li>July 17, 2015</li>
													<li><a href="single.html">Reply</a></li>
												</ul>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="media response-info">
											<div class="media-left response-text-left">

												<h5><a href="#">Username</a></h5>
											</div>
											<div class="media-body response-text-right">
												<p>回复内容</p>
												<ul>
													<li>July 17, 2015</li>
													<li><a href="single.html">Reply</a></li>
												</ul>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div class="clearfix"> </div>
								</div>

							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>


			</div>
@endsection