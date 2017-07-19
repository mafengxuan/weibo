@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>
    <script src="{{asset('/admin')}}/bootstrap/js/jquery-1.10.2.min.js"></script>
    <script src="{{asset('/admin')}}/bootstrap/js/lightbox-2.6.min.js"></script>

@endsection
@section('css')

    <link href="{{asset('/admin')}}/bootstrap/css/lightbox.css" rel="stylesheet" />


@endsection
@section('body')

    <body>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" href="{{url('admin/companynotaudited')}}"><i class="Hui-iconfont"></i> 待审核</a></span>
    <div class="page-container">

        <form action="{{url('admin/company')}}" mehtod="get">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;" name="s_time">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;" name="e_time">
            <input type="text" class="input-text" style="width:250px" placeholder="输入公司名称" id="" name="company_name">
            <input type="submit" class="btn btn-success radius" id="" name="sub" value="查询"><i class="Hui-iconfont">&#xe665;</i>
        </div>
        </form>

        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="80">ID</th>
                    <th width="100">公司名称</th>
                    <th width="40">申请人</th>
                    <th width="90">营业执照</th>
                    <th width="150">收费金额</th>
                    <th width="150">审核人</th>
                    <th width="130">审核通过时间</th>
                    <th width="70">审核状态</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr class="text-c">
                    <td>{{$v->company_id}}</td>
                    <td>{{$v->company_name}}</td>
                    <td>{{$v->username}}</td>
                    @if(!empty($v->company_img))
                    <td><a href={{$v->company_img}} data-lightbox="image-1" title="{{$v->company_name}}营业执照">点击查看营业执照</a></td>
                    @else
                    <td><img src=""></td>
                    @endif
                    <td>{{$v->price}}</td>
                    <td class="text-l;"  align="center" valign="middle">{{$v->auditor}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->p_time)}}</td>
                    @if($v->status==1)
                    <td class="td-status">已审核</td>
                    @endif
                    @if($v->status==3)
                    <td class="td-status">已驳回</td>
                    @endif
                </tr>
                @endforeach

                </tbody>
            </table>

            {!! $data->appends(['company_name'=>$company_name,'s_time'=>$s_time,'e_time'=>$e_time])->render() !!}

        </div>
    </div>
    </div>
    </body>

@endsection