@extends('home.layout.index')
@section('main-body')

			<div class="col-md-8 content-left">
				<div class="slider">
					<div class="callbacks_wrap">
						<ul class="rslides" id="slider">
							<li>
								<img src="{{asset('home')}}/images/3.jpg" alt="">
								<div class="caption">
									<a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry</a>
								</div>
							</li>
							<li>
								<img src="{{asset('home')}}/images/2.jpg" alt="">
								<div class="caption">
									<a href="single.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</a>
								</div>
							</li>
							<li>
								<img src="{{asset('home')}}/images/1.jpg" alt="">
								<div class="caption">
									<a href="single.html">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="articles">
					<header>
						<h3 class="title-head">实时微博</h3>
					</header>

			@foreach($microblog as $k => $v)
					<div class="article">
						<div class="article-left">
							<a href="single.html"><img src="{{$v->face}}"></a>
						</div>
						<div class="article-right">
							<div class="article-title">
								<a class="title" href="single.html">{{$v->nickname}}</a>
							</div>
							<div class="article-text">
								{!! $v->content !!}
								<p>{{date('Y-m-d H点i分',$v->ctime)}}
									{{--<a class="span_link" href="javascript:;" onclick="comment(this)">--}}
										{{--<span class="glyphicon glyphicon-edit"></span>评论--}}
									{{--</a>--}}
									<a class="span_link" href="#">
										<span class="glyphicon glyphicon-share"></span>{{$v->t_count}}
									</a>
									<a class="span_link" href="javascript:;" onclick="showcomment(this,{{$v->mid}})">
										<span class="glyphicon glyphicon-comment" ></span>{{$v->c_count}}
									</a>
									<a class="span_link" href="javascript:;" >
										<span class="glyphicon glyphicon-eye-open"></span>{{$v->mcount}}
									</a>
									<a class="span_link" href="#">
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
								{{--<h4>Responses</h4>--}}
								{{--<div class="media response-info">--}}
									{{--<div class="media-left response-text-left">--}}
										{{--<a href="#">--}}
											{{--<img class="media-object" src="{{asset('home')}}/images/c1.jpg" alt=""/>--}}
										{{--</a>--}}
										{{--<h5><a href="#">Username</a></h5>--}}
									{{--</div>--}}
									{{--<div class="media-body response-text-right">--}}
										{{--<p>评论内容</p>--}}
										{{--<ul>--}}
											{{--<li>Sep 21, 2015</li>--}}
											{{--<li><a href="single.html">Reply</a></li>--}}
										{{--</ul>--}}
										{{--<div class="media response-info">--}}
											{{--<div class="media-left response-text-left">--}}

												{{--<h5><a href="#">Username</a></h5>--}}
											{{--</div>--}}
											{{--<div class="media-body response-text-right">--}}
												{{--<p>回复内容</p>--}}
												{{--<ul>--}}
													{{--<li>July 17, 2015</li>--}}
													{{--<li><a href="single.html">Reply</a></li>--}}
												{{--</ul>--}}
											{{--</div>--}}
											{{--<div class="clearfix"> </div>--}}
										{{--</div>--}}
										{{--<div class="media response-info">--}}
											{{--<div class="media-left response-text-left">--}}

												{{--<h5><a href="#">Username</a></h5>--}}
											{{--</div>--}}
											{{--<div class="media-body response-text-right">--}}
												{{--<p>回复内容</p>--}}
												{{--<ul>--}}
													{{--<li>July 17, 2015</li>--}}
													{{--<li><a href="single.html">Reply</a></li>--}}
												{{--</ul>--}}
											{{--</div>--}}
											{{--<div class="clearfix"> </div>--}}
										{{--</div>--}}
										{{--<div class="media response-info">--}}
											{{--<div class="media-left response-text-left">--}}

												{{--<h5><a href="#">Username</a></h5>--}}
											{{--</div>--}}
											{{--<div class="media-body response-text-right">--}}
												{{--<p>回复内容</p>--}}
												{{--<ul>--}}
													{{--<li>July 17, 2015</li>--}}
													{{--<li><a href="single.html">Reply</a></li>--}}
												{{--</ul>--}}
											{{--</div>--}}
											{{--<div class="clearfix"> </div>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{--<div class="clearfix"> </div>--}}
								{{--</div>--}}

							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach


				</div>
			</div>
@endsection
@section('js')
	<script>

//		function comment(obj){
//		    $(obj).parent().parent().next().show();
//		}
		function docomment(obj,mid){
			var comment = $(obj).prev().val();
			$.post("{{url('home/index/docomment/')}}/"+mid,{'_token':"{{csrf_token()}}",comment:comment},function(data){

			    if(data.status == 0){
				    alert(data.msg);
					location.reload();
				}
			});
		}

		function reply(obj){
			$(obj).parent().parent().next().show();
		}

		function doreply(obj,mid,cid){
		    var content = $(obj).prev().val();
		    $.post("{{url('home/index/reply')}}",{'_token':"{{csrf_token()}}",'mid':mid,'cid':cid,'content':content},function(data){
                if(data.status == 0){
                    alert(data.msg);
                    location.reload();
                }
            });
		}

        function getLocalTime(nS) {
//            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
        }
        {{--var str = "<div class='media response-info'><div class='media-left response-text-left'><a href='#'><img class='media-object' src='{{asset('home')}}/images/c1.jpg' alt=''/></a><h5><a href='#'>Username</a></h5></div><div class='media-body response-text-right'><p>评论内容</p><ul><li>Sep 21, 2015</li><li><a href='single.html'>Reply</a></li></ul><div class='media response-info'><div class='media-left response-text-left'><h5><a href='#'>Username</a></h5></div><div class='media-body response-text-right'><p>回复内容</p><ul><li>July 17, 2015</li><li><a href='single.html'>Reply</a></li></ul></div><div class='clearfix'> </div></div></div><div class='clearfix'></div></div>";--}}
		function showcomment(obj,mid){

		    $.post("{{url('home/index/comment/')}}/"+mid,{'_token':"{{csrf_token()}}"},function(data){
                $(obj).parent().parent().parent().parent().find('div').eq(5).slideToggle();
		        var i = 0;
					for(i;i<data.length;i++){

                        var str = "<div class='media response-info'><div class='media-left response-text-left'><a href='#'><img class='media-object' src='"+data[i].face+"' alt=''/></a><h5><a href='#'>"+data[i].nickname+"</a></h5></div><div class='media-body response-text-right'><p>"+data[i].content+"</p><ul><li>"+getLocalTime(data[i].ctime)+"</li><li><a href='javascritp:;' onclick='reply(this)'>Reply</a></li></ul><div style='display:none;'><input type='text' name='reply' value='@"+data[i].nickname+":'><a href='javascript:;' onclick='doreply(this,"+data[i].mid+","+data[i].cid+")'>回复</a></div>";

						var j = 0;
						for(j;j<data[i].reply.length;j++){
							str += "<div class='media response-info'><div class='media-left response-text-left'><h5><a href='#'>"+data[i].reply[j].nickname+"</a></h5></div><div class='media-body response-text-right'><p>"+data[i].reply[j].content+"</p><ul><li>"+getLocalTime(data[i].reply[j].ctime)+"</li><li><a href='javascritp:;' onclick='reply(this)'>Reply</a></li></ul><div style='display:none;'><input type='text' name='reply' value='@"+data[i].reply[j].nickname+":'><a href='javascript:;' onclick='doreply(this,"+data[i].mid+","+data[i].cid+")'>回复</a></div></div><div class='clearfix'> </div></div>";

                        }
                        {{--$.post("{{url('home/index/reply')}}/"+data[i].cid,{'_token':"{{csrf_token()}}"},function(reply){--}}
							{{--var j = 0;--}}
							{{--for(j;j<reply.length;j++){--}}
                                {{--str += "<div class='media response-info'><div class='media-left response-text-left'><h5><a href='#'>"+reply[j].nickname+"</a></h5></div><div class='media-body response-text-right'><p>"+reply[j].content+"</p><ul><li>"+reply[j].ctime+"</li><li><a href='single.html'>Reply</a></li></ul></div><div class='clearfix'> </div></div>";--}}

                            {{--}--}}

						{{--})--}}

						str += "</div><div class='clearfix'></div></div>";

                        $(obj).parent().parent().parent().parent().find('div').eq(5).append(str);
					}

			})

//		    $(obj).parent().parent().parent().parent().find('div').eq(5).slideToggle();
//			alert($(obj).parent().parent().parent().find('div').eq(2).show());
		}


	</script>

@endsection