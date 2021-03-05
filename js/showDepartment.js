function showDepartment(){
    var read_select_department = '';
    $.getJSON("http://localhost/stationarySystem/api/department/read.php", function(data){
       
        $.each(data.records, function(key, val) {
 
             read_select_department += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $(".department").append( read_select_department );
    });   
}