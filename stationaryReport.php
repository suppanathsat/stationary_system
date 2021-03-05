<?php include 'checkAccess.php'?>
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
        <div class="container-fluid" style="margin-top:20px">

          <!-- Page Heading -->




          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">รายงานอุปกรณ์</h5>

            </div>
            <div class="card-body">
            <p>
             รายงาน : 
             <select  id="reportName">
                <option value="1">อุปกรณ์ทั้งหมด</option>
                <option value="2">อุปกรณ์ใกล้หมด</option>
                <option value="3">อุปกรณ์ที่หมดแล้ว</option>
                <option value="4">การเบิกอุปกรณ์</option>
              </select>
              <a class="btn btn-danger" id="pdfBtn" style="margin:15px;" onclick="pdfBtn();" href="pdfStationary.php" target="_blank" role="button"><i class="far fa-file-pdf fa-lg" style="margin-right: 5px;"></i>PDF</a>

              
             <div class="table-responsive" id="tableReport">
                
             </div>
              
              

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
    $(document).ready(function () {
      showStationary();
    });

    function pdfBtn(){
      
    }

    function showStationary(){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวนในสต็อค</th><th>จำนวนขั้นต่ำ</th></tr></thead><tbody>';
    
    
    var sta = $.getJSON("http://localhost/stationarySystem/api/stationary/read.php", function(data){
        
        
        $.each(data.records, function(key, val) {
         
            read_select_sta += "<tr class='starow'  value='"+val.sta_id+"'>";
            read_select_sta +=  "<td>"+val.sta_id+"</td>";
            read_select_sta +=  "<td>"+val.type_name+"</td>";
            read_select_sta +=  "<td>"+val.sta_name;
            if(val.brand!=""){read_select_sta +=  " "+val.brand}
            if(val.color!=""){read_select_sta +=  " สี"+val.color}
            if(val.sta_amount!=""){read_select_sta +=  " "+val.sta_amount+" "+val.unit+"/หน่วย"}
            read_select_sta += "</td>";
            read_select_sta +=  "<td>"+val.balance+"</td>";
            read_select_sta +=  "<td>"+val.min+"</td>";
            //แทคปิดแถว
            read_select_sta +=  "</tr>";
          
        });
        
        read_select_sta += "</tbody></table>";
        $("#tableReport").html(read_select_sta);
      });  

      }//showStationary

    function showNearlyOutOfStock(){
      var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
      read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
      read_select_sta += '<th>รหัส</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวนในสต็อค</th><th>จำนวนขั้นต่ำ</th></tr></thead><tbody>';
      
      var msg = "";
      var sta = $.getJSON("http://localhost/stationarySystem/api/stationary/readNearlyOutOfStock.php", function(data){
          
          
          $.each(data.records, function(key, val) {
          
              read_select_sta += "<tr class='starow'  value='"+val.sta_id+"'>";
              read_select_sta +=  "<td>"+val.sta_id+"</td>";
              read_select_sta +=  "<td>"+val.type_name+"</td>";
              read_select_sta +=  "<td>"+val.sta_name;
              if(val.brand!=""){read_select_sta +=  " "+val.brand}
              if(val.color!=""){read_select_sta +=  " สี"+val.color}
              if(val.size!=""){read_select_sta +=  " "+val.sta_amount+" "+val.unit+"/หน่วย"}
              read_select_sta += "</td>";
              read_select_sta +=  "<td>"+val.balance+"</td>";
              read_select_sta +=  "<td>"+val.min+"</td>";
              //แทคปิดแถว
              read_select_sta +=  "</tr>";
              
              
          });
          
          read_select_sta += "</tbody></table>";
          $("#tableReport").html(read_select_sta);
        });  
    }

    function showOutOfStock(){
      var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
      read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
      read_select_sta += '<th>รหัส</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวนในสต็อค</th><th>จำนวนขั้นต่ำ</th></tr></thead><tbody>';
      
      var msg = "";
      var sta = $.getJSON("http://localhost/stationarySystem/api/stationary/readOutOfStock.php", function(data){
          
          
          $.each(data.records, function(key, val) {
          
              read_select_sta += "<tr class='starow'  value='"+val.sta_id+"'>";
              read_select_sta +=  "<td>"+val.sta_id+"</td>";
              read_select_sta +=  "<td>"+val.type_name+"</td>";
              read_select_sta +=  "<td>"+val.sta_name;
              if(val.brand!=""){read_select_sta +=  " "+val.brand}
              if(val.color!=""){read_select_sta +=  " สี"+val.color}
              if(val.size!=""){read_select_sta +=  " "+val.sta_amount+" "+val.unit+"/หน่วย"}
              read_select_sta += "</td>";
              read_select_sta +=  "<td>"+val.balance+"</td>";
              read_select_sta +=  "<td>"+val.min+"</td>";
              //แทคปิดแถว
              read_select_sta +=  "</tr>";
              
              
          });
          
          read_select_sta += "</tbody></table>";
          $("#tableReport").html(read_select_sta);
        });
    }

    function showStaffIssue(){
      var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
      read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
      read_select_sta += '<th>รหัส</th><th>อุปกรณ์</th><th>เบิกจำนวน</th><th>เบิกโดย</th><th>วันที่เบิก</th></tr></thead><tbody>';
      
      var msg = "";
      var sta = $.getJSON("http://localhost/stationarySystem/api/stationary/readStaffIssue.php", function(data){
          
          
          $.each(data.records, function(key, val) {
          
              read_select_sta += "<tr class='starow'  value='"+val.tran_id+"'>";
              read_select_sta +=  "<td>"+val.tran_id+"</td>";
              read_select_sta +=  "<td>"+val.sta_name;
              if(val.brand!=""){read_select_sta +=  " "+val.brand}
              if(val.color!=""){read_select_sta +=  " สี"+val.color}
              if(val.size!=""){read_select_sta +=  " "+val.sta_amount+" "+val.unit+"/หน่วย"}
              read_select_sta += "</td>";
              read_select_sta +=  "<td>"+val.amount+"</td>";
              read_select_sta +=  "<td>"+val.fname+" "+val.lname+"</td>";
              read_select_sta +=  "<td>"+val.tran_date+"</td>";
              //แทคปิดแถว
              read_select_sta +=  "</tr>";
              
              
          });
          
          read_select_sta += "</tbody></table>";
          $("#tableReport").html(read_select_sta);
        });
    }

      $( "#reportName" ).change(function() {
        $reportName = $( "#reportName" ).val();
        if($reportName == 1){
          showStationary();
          $("#pdfBtn").attr("href", "pdfStationary.php");
        }else if($reportName == 2){
          showNearlyOutOfStock();
          $("#pdfBtn").attr("href", "pdfNearlyOutOfStock.php");
        }else if($reportName == 3){
          showOutOfStock();
          $("#pdfBtn").attr("href", "pdfOutOfStock.php");
        }else if($reportName == 4){
          showStaffIssue();
          $("#pdfBtn").attr("href", "pdfStaffIssue.php");
        }
      });
  </script>

</body>

</html>