@extends('home.layout.index')
@section('main-body')


			<div class="single-page">
				<div class="col-md-2 share_grid">
					<h3>SHARE</h3>
					<ul>
						<li>
							<a href="#">
								<i class="facebook"></i>
								<div class="views">
									<span>SHARE</span>
									<label>180</label>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="twitter"></i>
								<div class="views">
									<span>TWEET</span>
									<label>355</label>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="linkedin"></i>
								<div class="views">
									<span>SHARES</span>
									<label>28</label>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="pinterest"></i>
								<div class="views">
									<span>PIN</span>
									<label>16</label>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="email"></i>
								<div class="views">
									<span>Email</span>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-6 content-left single-post">
					<div class="blog-posts">

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


							</div>
							<div class="clearfix"></div>
						</div>




						<div class="last-article">
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
							<ul class="categories">
								<li><a href="#">Markets</a></li>
								<li><a href="#">Business</a></li>
								<li><a href="#">Sport</a></li>
								<li><a href="#">Special reports</a></li>
								<li><a href="#">Culture</a></li>
							</ul>
							<div class="clearfix"></div>
							<!--related-posts-->
							<div class="row related-posts">
								<h4>推荐微博</h4>
								<div class="col-xs-6 col-md-3 related-grids">
									<a href="single.html" class="thumbnail">
										<img src="images/f2.jpg" alt=""/>
									</a>
									<h5><a href="single.html">Lorem Ipsum is simply</a></h5>
								</div>
								<div class="col-xs-6 col-md-3 related-grids">
									<a href="single.html" class="thumbnail">
										<img src="images/f1.jpg" alt=""/>
									</a>
									<h5><a href="single.html">Lorem Ipsum is simply</a></h5>
								</div>
								<div class="col-xs-6 col-md-3 related-grids">
									<a href="single.html" class="thumbnail">
										<img src="images/f3.jpg" alt=""/>
									</a>
									<h5><a href="single.html">Lorem Ipsum is simply</a></h5>
								</div>
								<div class="col-xs-6 col-md-3 related-grids">
									<a href="single.html" class="thumbnail">
										<img src="images/f6.jpg" alt=""/>
									</a>
									<h5><a href="single.html">Lorem Ipsum is simply</a></h5>
								</div>
							</div>
							<!--//related-posts-->

							<div class="clearfix"></div>
						</div>
					</div>

				</div>
				<div class="col-md-4 side-bar">
					<div class="first_half">
						<div class="categories">
							<header>
								<h3 class="side-title-head">Categories</h3>
							</header>
							<ul>
								<li><a href="business.html">Business</a></li>
								<li><a href="technology.html">Technology</a></li>
								<li><a href="entertainment.html">Entertainment</a></li>
								<li><a href="sports.html">Sports</a></li>
								<li><a href="fashion.html">Fashion</a></li>
								<li><a href="shortcodes.html">Health</a></li>
							</ul>
						</div>



					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>


@endsection