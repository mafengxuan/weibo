@extends('admin.layout.blank')
@section('js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{asset('/admin')}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin')}}/lib/laypage/1.2/laypage.js"></script>

@endsection
@section('body')

    <body>

    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查找</button>
        </div>

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
                    <td><img src=""></td>
                    <td>{{$v->price}}</td>
                    <td class="text-l">{{$v->auditor}}</td>
                    <td>{{date('Y-m-d H:i:s',$v->p_time)}}</td>
                    @if($v->status==1)
                    <td class="td-status">已审核</td>
                    @endif
                </tr>
                @endforeach

                </tbody>
            </table>


            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        {!! $data->render() !!}
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </div>
    </div>

    </body>

@endsection