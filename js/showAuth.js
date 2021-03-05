function showAuth(){
    var read_select_department = '';
    $.getJSON("http://localhost/stationarySystem/api/authen/read.php", function(data){
       
        $.each(data.records, function(key, val) {
 
             read_select_department += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $(".auth").append( read_select_department );
    });   
}