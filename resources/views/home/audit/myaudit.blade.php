@extends('home.layout.center')
@section('show')
                <!--个人信息 -->
                @if(!empty($r))
                <div class="info-main">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            申请人：{{session('user_home')->phone}}
                        </div>
                        <div class="am-form-group">
                            申请时间：{{date('Y-m-d',$r->p_time)}}
                        </div>
                        <div class="am-form-group">
                            申请类型：{{$type}}
                        </div>
                        <div class="am-form-group">
                            审核状态：@if ($r->status == 1)
                                            已通过认证
                                      @elseif ($r->status == 2)
                                            待审核认证
                                      @elseif ($r->status == 3)
                                            已驳回申请
                                      @endif
                        </div>
                    </form>
                </div>
                @else
                <div class="info-main">
                    未提交任何申请
                </div>
                @endif
    @endsection

