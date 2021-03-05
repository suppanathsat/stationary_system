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
              <h5 class="m-0 font-weight-bold text-white ">Transition Table</h5>

            </div>
            <div class="card-body">
                 <div id="transitionTable"></div>
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
    $(document).ready(function () {
      showTransition();
    });

    function showTransition(){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>วันเวลา</th><th>ประเภท</th><th>อุปกรณ์</th><th>จำนวน</th><th>ราคา</th><th>เอกสาร</th><th>โดยพนักงาน</th></tr></thead><tbody>';
    
    
    var sta = $.getJSON("http://localhost/stationarySystem/api/transition/read.php", function(data){
       
        
        $.each(data.records, function(key, val) {
         
            read_select_sta += "<tr>";
            read_select_sta +=  "<td>"+val.tran_id+"</td>";
            read_select_sta +=  "<td>"+val.tran_date+"</td>";
            if(val.is_receive == true){
              read_select_sta +=  "<td>นำเข้า</td>";
            }else{
              read_select_sta +=  "<td>เบิก</td>";
            }
            read_select_sta +=  "<td>"+val.sta_name+" "+val.brand_name+" สี"+val.color_name+" "+val.sta_amount+" "+val.unit_name+"/ต่อหน่วย</td>";
            read_select_sta +=  "<td>"+val.amount+"</td>";
            read_select_sta +=  "<td>"+val.price+"</td>";
            read_select_sta +=  "<td>"+val.receive_num+"</td>";
            read_select_sta +=  "<td>"+val.fname+val.lname+"</td>";
           
            //แทคปิดแถว
            read_select_sta +=  "</tr>";
          
        });
        
        read_select_sta += "</tbody></table>"
        $("#transitionTable").html(read_select_sta);
      });  

      }//showStationary
  </script>

</body>

</html>