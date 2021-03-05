<?php 
    include 'checkAccess.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stationary System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sta_row.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'slidebar.php'?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        

        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top: 15px;">

          <!-- Page Heading -->

            <?php
                if(isset($_GET['msg'])){
           
                echo  '<script >alert("'.$_GET['msg'].'");</script>';
           
                }
            ?>


          <!-- DataTales  -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">Issue Status Table</h5>

            </div>
            <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-2">
                        <label for="status_type">แสดงสถานะ</label>
                        <select class="form-control" id="status_type">
                          <option id="กำลังพิจารณา">กำลังพิจารณา</option>
                          <option id="อนุมัติ">อนุมัติ</option>
                          <option id="ไม่อนุมัติ">ไม่อนุมัติ</option>
                          <option id="รับของแล้ว">รับของแล้ว</option>
                          <option id="ทั้งหมด">ทั้งหมด</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                          <label for="tran_id">รหัสการเบิก</label>
                          <input type="text" class="form-control" id="tran_id">
                      </div>
                  </div>
                 <div class="row">
                     <div class="col-md-12" id="issueTable">
                        
                     </div>
                 </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
      

     
      

    </div><!-- End of Content Wrapper -->


  </div><!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  
 
  
  <script id="myScript">

     
    

      
     

    function showIssue(){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>อุปกรณ์</th><th>จำนวน</th><th>ในสต๊อค</th><th>สถานะ</th></tr></thead><tbody>';
    
    var script = "";
    var sta = $.getJSON("http://localhost/stationarySystem/api/issue_status/read.php", function(data){
        
       

        $.each(data.records, function(key, val) {
         
            read_select_sta += "<tr class='starow'  value='"+val.staff_id+"'>";
              read_select_sta +=  "<td>"+val.tran_id+"</td>";
              read_select_sta +=  "<td>";
                  read_select_sta +=  val.sta_name;
                  read_select_sta +=  " "+val.brand_name;
                  read_select_sta +=  " สี"+val.color_name;
                  read_select_sta +=  " "+val.sta_amount;
                  read_select_sta +=  " "+val.unit_name;
                  read_select_sta +=  "/หน่วย";
              read_select_sta += "</td>";
                  if(val.status_name == "กำลังพิจารณา" && parseInt(val.amount)>parseInt(val.balance)){
                          style = "color:red;";
                  }
              read_select_sta +=  "<td style='"+style+"'>";
                  read_select_sta += val.amount;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                  read_select_sta += val.balance;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                     
                          var style = "";
                          if(val.status_name == "กำลังพิจารณา"){
                            style = "background-color:orange;border:orange;color:white;";
                          }else if(val.status_name == "อนุมัติ"){
                            style = "background-color:green;border:green;color:white;";
                          }else if(val.status_name == "ไม่อนุมัติ"){
                            style = "background-color:red;border:red;color:white;";
                          }
                          read_select_sta += '<div class="dropdown ">'
                          read_select_sta += '  <a class="btn btn-secondary dropdown-toggle" style="'+style+'" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                          read_select_sta += val.status_name;
                          read_select_sta += '  </a>'
                          if( parseInt(val.amount)>parseInt(val.balance) && val.status_name == "กำลังพิจารณา"){
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '  </div>'
                          }else{
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=อนุมัติ&tran_id='+val.tran_id+'">อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=รับของแล้ว&tran_id='+val.tran_id+'">รับของแล้ว</a>'
                            read_select_sta += '  </div>'
                            read_select_sta += '</div>'
                          }
                     
                           
              read_select_sta += "</td>";
             
            read_select_sta +=  "</tr>";
          
        });
        
        read_select_sta += "</tbody></table>";
        
        $("#issueTable").html(read_select_sta);
      });  


      
      
      }//showStationary


      function   searchByTran(tran_id){
        var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
        read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
        read_select_sta += '<th>รหัส</th><th>อุปกรณ์</th><th>จำนวน</th><th>ในสต๊อค</th><th>สถานะ</th></tr></thead><tbody>';
        var i = 0;
        
        var sta = $.getJSON("http://localhost/stationarySystem/api/issue_status/readOne.php?tran_id="+tran_id, function(data){
          
                $.each(data.records, function(key, val) {
                  i = 1;
                  read_select_sta += "<tr class='starow'  value='"+val.staff_id+"'>";
              read_select_sta +=  "<td>"+val.tran_id+"</td>";
              read_select_sta +=  "<td>";
                  read_select_sta +=  val.sta_name;
                  read_select_sta +=  " "+val.brand_name;
                  read_select_sta +=  " สี"+val.color_name;
                  read_select_sta +=  " "+val.sta_amount;
                  read_select_sta +=  " "+val.unit_name;
                  read_select_sta +=  "/หน่วย";
              read_select_sta += "</td>";
                  if(val.status_name == "กำลังพิจารณา" && parseInt(val.amount)>parseInt(val.balance)){
                          style = "color:red;";
                  }
              read_select_sta +=  "<td style='"+style+"'>";
                  read_select_sta += val.amount;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                  read_select_sta += val.balance;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                     
                          var style = "";
                          if(val.status_name == "กำลังพิจารณา"){
                            style = "background-color:orange;border:orange;color:white;";
                          }else if(val.status_name == "อนุมัติ"){
                            style = "background-color:green;border:green;color:white;";
                          }else if(val.status_name == "ไม่อนุมัติ"){
                            style = "background-color:red;border:red;color:white;";
                          }
                          read_select_sta += '<div class="dropdown ">'
                          read_select_sta += '  <a class="btn btn-secondary dropdown-toggle" style="'+style+'" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                          read_select_sta += val.status_name;
                          read_select_sta += '  </a>'
                          if( parseInt(val.amount)>parseInt(val.balance) && val.status_name == "กำลังพิจารณา"){
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '  </div>'
                          }else{
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=อนุมัติ&tran_id='+val.tran_id+'">อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=รับของแล้ว&tran_id='+val.tran_id+'">รับของแล้ว</a>'
                            read_select_sta += '  </div>'
                            read_select_sta += '</div>'
                          }
                     
                           
              read_select_sta += "</td>";
             
            read_select_sta +=  "</tr>";
          
               });
                
               read_select_sta += "</tbody></table>";
              if(i!=1){
                $("#issueTable").html("ไม่พบข้อมูลที่ค้นหา");
              }else{
                $("#issueTable").html(read_select_sta);
              }
              
          
        });  
      }


      function   searchByStatus(status_name){
        var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
        read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
        read_select_sta += '<th>รหัส</th><th>อุปกรณ์</th><th>จำนวน</th><th>ในสต๊อค</th><th>สถานะ</th></tr></thead><tbody>';
       
        
        var sta = $.getJSON("http://localhost/stationarySystem/api/issue_status/readByStatus.php?status_name="+status_name, function(data){
          var len = 0;
                $.each(data.records, function(key, val) {
                  len++;
                  read_select_sta += "<tr class='starow'  value='"+val.staff_id+"'>";
              read_select_sta +=  "<td>"+val.tran_id+"</td>";
              read_select_sta +=  "<td>";
                  read_select_sta +=  val.sta_name;
                  read_select_sta +=  " "+val.brand_name;
                  read_select_sta +=  " สี"+val.color_name;
                  read_select_sta +=  " "+val.sta_amount;
                  read_select_sta +=  " "+val.unit_name;
                  read_select_sta +=  "/หน่วย";
              read_select_sta += "</td>";
                  if(val.status_name == "กำลังพิจารณา" && parseInt(val.amount)>parseInt(val.balance)){
                          style = "color:red;";
                  }
              read_select_sta +=  "<td style='"+style+"'>";
                  read_select_sta += val.amount;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                  read_select_sta += val.balance;
              read_select_sta += "</td>";
              read_select_sta +=  "<td>";
                     
                          var style = "";
                          if(val.status_name == "กำลังพิจารณา"){
                            style = "background-color:orange;border:orange;color:white;";
                          }else if(val.status_name == "อนุมัติ"){
                            style = "background-color:green;border:green;color:white;";
                          }else if(val.status_name == "ไม่อนุมัติ"){
                            style = "background-color:red;border:red;color:white;";
                          }
                          read_select_sta += '<div class="dropdown ">'
                          read_select_sta += '  <a class="btn btn-secondary dropdown-toggle" style="'+style+'" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                          read_select_sta += val.status_name;
                          read_select_sta += '  </a>'
                          if( parseInt(val.amount)>parseInt(val.balance) && val.status_name == "กำลังพิจารณา"){
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?old_status='+val.status_name+'&new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '  </div>'
                          }else{
                            read_select_sta += '  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=กำลังพิจารณา&tran_id='+val.tran_id+'">กำลังพิจารณา</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=อนุมัติ&tran_id='+val.tran_id+'">อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=ไม่อนุมัติ&tran_id='+val.tran_id+'">ไม่อนุมัติ</a>'
                            read_select_sta += '    <a class="dropdown-item"  href="api/issue_status/update.php?new_status=รับของแล้ว&tran_id='+val.tran_id+'">รับของแล้ว</a>'
                            read_select_sta += '  </div>'
                            read_select_sta += '</div>'
                          }
                            
              read_select_sta += "</td>";
             
            read_select_sta +=  "</tr>";
          
               });
                
               read_select_sta += "</tbody></table>";
               console.log(len);

              if(typeof len == "number"){
                $("#issueTable").html(read_select_sta);
              }else{
                $("#issueTable").html("");
              }
              
          
        });  
      }

      $(document).ready(function () {
          showIssue();
      });

      $( "#tran_id" ).keyup(function() {
            var tran_id = $( "#tran_id" ).val();
            searchByTran(tran_id);
      });

      $( "#status_type" ).change(function() {
            var status_name = $( "#status_type" ).val();
            searchByStatus(status_name);
      });
  </script>

</body>

</html>









