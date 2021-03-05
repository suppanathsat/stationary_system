function showTranType(){
    var read_select_type = '';
    var header = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    header += '<thead><tr class="bg-primary" style="color:white">';
    header += '<th>tran_type_id</th><th>tran_name</th></tr></thead><tbody>'
    read_select_type += header;
    $.getJSON("http://localhost/stationarySystem/api/tran_type/read.php", function(data){
       
        $.each(data.records, function(key, val) {
            read_select_type += '<tr>';
                read_select_type += '<td>'+val.id+'</td>';
                read_select_type += '<td>'+val.name+'</td>';
            read_select_type += '</tr>';
            
        });
        read_select_type += '</tbody></table>'
        $(".tran_type").append(read_select_type);
    });
 
}