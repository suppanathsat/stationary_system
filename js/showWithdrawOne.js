function showWithdrawOne(user_id){
    var read_withdraw = '';
    var last_name = '';
    var i = 1;
    $.getJSON("http://localhost/stationarySystem/api/withdraw/readOne.php?user_id="+user_id, function(data){
        
        $.each(data.records, function(key, val) {

            if(last_name != val.approve_name && i==1){
                read_withdraw += '<h4 text-black style="margin-top:15px">'+val.approve_name+'</h4>';
                read_withdraw += '<hr>';
                last_name = val.approve_name;
            }else if(last_name != val.approve_name && i!=1){
                read_withdraw += '</div>';
                read_withdraw += '<h4 text-black style="margin-top:30px">'+val.approve_name+'</h4>';
                read_withdraw += '<hr>';
                last_name = val.approve_name;
                i = 1;
            }

            
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
                                        read_withdraw += 'จำนวนเบิก  : '+val.unit+' <br>';

                                        if(val.approve_name == 'กำลังพิจารณา'){
                                            read_withdraw += '<button type="button" style="margin-top:10px" class="btn btn-warning btn-sm">กำลังพิจารณา</button>';
                                        }else if(val.approve_name == 'อนุมัติแล้ว'){
                                            var data = val.receive_date;
                                            var array = data.split("-");
                                            var receive_date = array[2] + '/' + array[1] + '/' + array[0];
                                            read_withdraw += 'วันรับของ : '+receive_date+'<br>';
                                            read_withdraw += '<button type="button" style="margin-top:10px" class="btn btn-success btn-sm"><i class="far fa-check-circle"></i>อนุมัติแล้ว</button>';
                                        }else if(val.approve_name == 'ไม่อนุมัติ'){
                                            read_withdraw += '<button type="button" style="margin-top:10px" class="btn btn-danger btn-sm" ><i class="far fa-times-circle"></i>ไม่อนุมัติ</button>';
                                        }

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

        
        $("#withdrawOne").append(read_withdraw);
    });   
}



                          
                            
                              
                                
                                  
                                      
                                  
                                  
                                    
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                  
                  