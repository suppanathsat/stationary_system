function searchStationary(dept_id,type_id,search,searchBy){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>รูปภาพ</th><th>แผนก</th><th>ประเภท</th><th>ชื่ออุปกรณ์</th><th>จำนวนในสต็อค</th></tr></thead><tbody>';
    var url = "http://localhost/stationarySystem/api/stationary/search.php?type_id="+type_id+"&search="+search+"&searchBy="+searchBy;
    
    var notfound = '<tr><td>ไม่พบอุปกรณ์</td></tr>';
    $("#stationary").html(notfound);

    $.getJSON(url, function(data){
       
        $.each(data.records, function(key, val) {
            read_select_sta += "<tr class='starow' onclick='showOneStationary("+val.sta_id+")' data-toggle='modal' data-target='#modalReadOne' value='"+val.sta_id+"'>";
            read_select_sta +=  "<td>"+val.sta_id+"</td>";
            read_select_sta += "<td><img src='http://localhost/stationarySystem/api/stationary/uploads/"+val.sta_img+"' style='height:60px' alt='' srcset=''></td>";
            read_select_sta +=  "<td>"+val.dept_name+"</td>";
            read_select_sta +=  "<td>"+val.type_name+"</td>";
            read_select_sta +=  "<td>"+val.sta_name+"</td>";
            read_select_sta +=  "<td>"+val.inStock+"</td>";
            read_select_sta +=  "</tr>";
        });
        read_select_sta += "</tbody></table>"
        $("#stationary").html(read_select_sta);
        
    });   

}
