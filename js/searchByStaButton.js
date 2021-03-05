function searchStaByStaID(){
    $('#searchBy').html('รหัสอุปกรณ์');
    $('#searchBy').val('sta_id');

    var type_id = $(".type").val();
    var search = $('#search').val();
    var searchBy = $('#searchBy').val();
    searchStationary(type_id,search,searchBy);
}

function searchStaByStaName(){
    $('#searchBy').html('ชื่ออุปกรณ์');
    $('#searchBy').val('sta_name');

    var type_id = $(".type").val();
    var search = $('#search').val();
    var searchBy = $('#searchBy').val();
    searchStationary(type_id,search,searchBy);
}