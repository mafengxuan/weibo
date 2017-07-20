@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>

@endsection
@section('title')
    <title>网站</title>

    @endsection


@section('body')


    <div class="page-container">
        <form action="{{url('admin/config/change')}}" method="post">
            {{csrf_field()}}
        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th scope="col" colspan="9">配置项列表</th>
            </tr>
            <tr class="text-c">

                <th width="">ID</th>
                <th width="">标题</th>
                <th >名称</th>
                <th >内容</th>
                <th width="">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k => $v)
            <tr class="text-c">

                <td>{{$v->id}}</td>
                <td>{{$v->conf_title}}</td>
                <td>{{$v->conf_name}}</td>
                <td>
                    <input type="hidden" name="id[]" value="{{$v->id}}">
                    {!! $v->_content !!}
                </td>
                <td class="td-manage">
                    <a href="{{url('admin/config/'.$v->id.'/edit')}}" title="修改" class="btn btn-inf">修改</a>
                    <a href="javascript:;" onclick="del({{$v->id}})" title="删除" class="btn btn-inf">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>




        </table>
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交修改配置信息&nbsp;&nbsp;">


        </form>

    </div>

@endsection
<script>
    function del(id){

        //询问框
        layer.confirm('确认删除该配置项？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/config')}}/"+id,{'_token':"{{csrf_token()}}"},function(data){
                if(data.status==0){
                    layer.msg(data.msg,{icon:6});
                    location.href = location.href;
                }else{
                    layer.msg(data.msg,{icon:5});
                    location.href = location.href;
                }
            });
        }, function(){

        });


    }
</script>