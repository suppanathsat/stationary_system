function showAuthType(){
    var read_select_type = '';
    var header = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    header += '<thead><tr ><th colspan="4" class="bg-primary" style="color:white">สิทธิ์การเข้าถึงข้อมูล</th></tr><tr class="bg-primary" style="color:white">';
    header += '<th>auth_id</th><th>auth_name</th><th></th></tr></thead><tbody>'
    read_select_type += header;
    $.getJSON("http://localhost/stationarySystem/api/authen/read.php", function(data){
       
        $.each(data.records, function(key, val) {
            read_select_type += '<tr>';
                read_select_type += '<td>'+val.id+'</td>';
                read_select_type += '<td>'+val.name+'</td>';
                button = ' <td><div class="dropdown" id="'+val.id+'" >';
                button += '<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                button += '<i class="fas fa-cog"></i>';
                button += '</a>';
                button += '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                    button += '<a class="dropdown-item" data-toggle="modal" value="'+val.id+'" data-target="#addAuth" >เพิ่ม</a>';
                    button += '<a class="dropdown-item" data-toggle="modal"   data-target="#editModal" onclick="editAuth()" >แก้ไข</a>';
                    button += '<a class="dropdown-item" data-toggle="modal" data-target="#deleteModal"  onclick="deleteAuth()"  >ลบ</a>';
                button += '</div>';
            button += '</div></td>';
            read_select_type += button;
            read_select_type += '</tr>';
        });
        read_select_type += '</tbody></table>'
        $(".auth_type").append(read_select_type);
    });
    

}