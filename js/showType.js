function showType(){
    var read_select_type = '';
    $.getJSON("http://localhost/stationarySystem/api/type/read.php", function(data){
       
        $.each(data.records, function(key, val) {
 
             read_select_type += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $(".type").append(read_select_type);
    });
    
   

}