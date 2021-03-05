function showWithdrawByDept(dept_id){
    var read_withdraw = '';
    var last_name = '';
    var script = '<script>';
    var i = 1;
    $.getJSON("http://localhost/stationarySystem/api/withdraw/readByDept.php?dept_id="+dept_id, function(data){
        
        $.each(data.records, function(key, val) {
            if(i%2==1){
                read_withdraw += '<div class="row" style="margin-top: 15px;">';
            }
                    read_withdraw += '<div class="col-md-6 ">';
                        read_withdraw += '<div class="card bg-light" >';
                            read_withdraw += '<div class="card-body text-black" style="color: black;">';
                                read_withdraw += '<div class="row">';
                                    read_withdraw += '<div class="col-md-4" style="background-image: url('+"'api/stationary/uploads/"+val.sta_img+"'"+');background-position: center;background-size: cover;background-repeat: no-repeat;height: 120px;">';
                                    read_withdraw += '</div>';
                                    read_withdraw += '<div class="col-md-8">';
                                        read_withdraw += 'รหัสการเบิก : '+val.w_id;
                                        read_withdraw += '<hr style="margin: 2px;">';
                                        read_withdraw += 'อุปกรณ์ : '+val.sta_name+' <br>';
                                        read_withdraw += 'แผนก : '+val.dept_name+' <br>';
                                        read_withdraw += 'จำนวนเบิก : '+val.unit+' <br>';
                                        read_withdraw += '<form action="approve.php" method="POST">';
                                        read_withdraw += 'วันรับของ : <input type="date" name="date" required><br>';
                                            read_withdraw += '<button type="submit" name="w_id" value="'+val.w_id+'" style="margin-top:10px;" class="btn btn-success btn-sm approve"><i class="far fa-check-circle"></i>อนุมัติ</button>';
                                            read_withdraw += '<a class="btn btn-danger btn-sm" style="margin-left:10px;margin-top:10px;" href="notApprove.php?w_id='+val.w_id+'" role="button"><i class="far fa-times-circle"></i>ไม่อนุมัติ</a>'
                                           // read_withdraw += '<button type="button"   class="btn btn-danger btn-sm cancle" ><i class="far fa-times-circle"></i>ไม่อนุมัติ</button>';
                                        read_withdraw += '</form>';
                                    read_withdraw += '</div>';
                                read_withdraw += '</div>';//row
                            read_withdraw += '</div>';//cardbody
                        read_withdraw += '</div>';//card
                    read_withdraw += '</div>';//col-md-6
            if(i%2==0){
                read_withdraw += '</div>';
            }
            i++;
        });
        
        $("#withdrawByDept").append(read_withdraw);
        $("#withdrawByDept").append(script);
    });   
}


                               
                              