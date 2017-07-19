
function check_audit(str)
{
    var type = str;
    // $.post("/home/auditcheck",{'_token':"{{csrf_token()}}"},function(data){
    //     if(data.status==0){
    //         location.href="{{url('home')}}/"+type;
    //     }else{
    //         alert('有待审核或已通过审核认证，不能再次申请');
    //     }
    // })

    $.ajax({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url:"/home/auditcheck",
        async: true,
        success: function (data) {
            if(data.status==0){
                location.href="/home/"+type;
            }else{
                alert('有待审核或已通过审核认证，不能再次申请');
            }
        }
    });
}
