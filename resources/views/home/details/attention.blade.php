@extends('home.layout.index')
@section('main-body')


	<div class="single-page">
		<div class="col-md-2 share_grid">

		</div>
		<div class="col-md-6 content-left single-post">
			<div class="blog-posts">
				@foreach($microblog as $k => $v)

					<div class="article">
						<div class="article-left">
							<a href="single.html"><img src="{{$v->face}}"></a>
						</div>
						<div class="article-right">
							<div class="article-title">
								<a class="title" href="javascript:;">{{$v->nickname}}</a>
								@if(in_array($v->uid,$attention))
									<a style="cursor: pointer;font-size:14px;color:red;" href="javascript:;" onclick="noattention({{$v->uid}})" ><span class="glyphicon glyphicon-heart" ></span>已关注</a>
								@else
									<a style="cursor: pointer;font-size:14px;color:red;" href="javascript:;" onclick="attention({{$v->uid}})" ><span class="glyphicon glyphicon-heart" ></span>关注</a>
								@endif
							</div>
							<div class="article-text">
								{!! $v->content !!}
								<p>{{date('Y-m-d H点i分',$v->ctime)}}
									@if(in_array($v->mid,$collect))
										<a class="span_link" href="javascript:;" onclick="nocollect({{$v->mid}})">
											<span class="glyphicon glyphicon-edit"></span>已收藏
										</a>
									@else
										<a class="span_link" href="javascript:;" onclick="collect({{$v->mid}})">
											<span class="glyphicon glyphicon-edit"></span>收藏
										</a>
									@endif
									<a class="span_link" href="javascript:;" onclick="transpond({{$v->mid}})">
										<span class="glyphicon glyphicon-share"></span>{{$v->t_count}}
									</a>
									<a class="span_link" href="javascript:;" onclick="showcomment(this,{{$v->mid}})">
										<span class="glyphicon glyphicon-comment" ></span>{{$v->c_count}}
									</a>
									<a class="span_link" href="javascript:;" onclick="zan({{$v->mid}})">
										<span class="glyphicon glyphicon-thumbs-up"></span>{{$v->p_count}}
									</a>
								</p>

								<div class="clearfix"></div>
							</div>
							<div style="display:none">
								<input type="text" class="" name="comment"><a href="javascript:;" onclick="docomment(this,{{$v->mid}})">评论</a>
							</div>
							{{--评论内容--}}

							<div class="response" style="display:none">

							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				@endforeach
			</div>

		</div>
		<div class="col-md-4 side-bar">
			<div class="first_half">

				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>


@endsection