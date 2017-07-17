@extends('admin.layout.blank')
@section('body')
<article class="page-container">
	<form action="{{url('admin/role/'.$info->id)}}" method="post" class="form form-horizontal" id="form-admin-role-add">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->name}}" placeholder="" id="roleName" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$info->description}}" placeholder="" id="" name="description">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">角色权限：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="" name="idall" id="user-Character-0">
							全选</label>
					</dt>
					@foreach($data as $k => $v)
					<dd>

						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<input type="checkbox" value="{{$v['id']}}" @if(in_array($v['id'],$ids)) checked @endif name="id[]" id="user-Character-0-1">
									{{$v['description']}}&nbsp;&nbsp;||&nbsp;&nbsp;</label>
							</dt>

							<dd>
								@foreach($v['son'] as $m => $n)
								<label class="">
									<input type="checkbox" value="{{$n['id']}}" @if(in_array($n['id'],$ids)) checked @endif name="id[]" id="user-Character-0-1-0">
									{{$n['description']}}</label>

								@endforeach

							</dd>
						</dl>
					</dd>
					@endforeach
				</dl>

			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
@endsection

@section('js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{asset('admin')}}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
//			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	$("#form-admin-role-add").validate({
		rules:{
			roleName:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                success: function(data) {
                    layer.alert(data.msg,function(){
                        parent.location.reload();
					})
                }
			});
//			var index = parent.layer.getFrameIndex(window.name);
//			parent.layer.close(index);

		}
	});
});
</script>
@endsection
