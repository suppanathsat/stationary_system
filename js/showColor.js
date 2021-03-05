function showColor(){
    var read_select_type = '';
    $.getJSON("http://localhost/stationarySystem/api/color/read.php", function(data){
       
        $.each(data.records, function(key, val) {
 
             read_select_type += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $(".color").append(read_select_type);
    });
    
   

}