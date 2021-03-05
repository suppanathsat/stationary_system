function showWithdrawByDept(dept_id){
    var read_receive = '';

    $.getJSON("http://localhost/stationarySystem/api/withdraw/readWaitingToReceive.php?dept_id="+dept_id, function(data){
        
        $.each(data.records, function(key, val) {
            read_receive += '<tr>';
                read_receive += '<td>'+val.w_id+'</td>';
                read_receive += '<td><img src="api/stationary/uploads/'+val.sta_img+'" alt="" style="height:50px;" srcset=""></td>';
                read_receive += '<td>'+val.sta_name+'</td>';
                read_receive += '<td>'+val.inStock+'</td>';
                read_receive += '<td>'+val.unit+'</td>';
                read_receive += '<td><a class="btn btn-success" href="#" role="button">รับของแล้ว</a><a class="btn btn-danger" style="margin-left:5px;" href="#" role="button">ยกเลิก</a></td>';
            read_receive += '</tr>';
        });
        
        $("#receive").html(read_receive);
    });   
}
