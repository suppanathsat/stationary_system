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

        <?php include 'topbar.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->




          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">รายงานการเบิกอุปกรณ์</h5>

            </div>
            <div class="card-body">
              <p><a class="btn btn-danger" style="margin:15px;" href="pdfSample.php" target="_blank" role="button"><i class="far fa-file-pdf fa-lg" style="margin-right: 5px;"></i>PDF</a>รายงาน : การเบิกอุปกรณ์ ประจำเดือน กุมภาพันธ์ 2562 </p>
              
              <table class="table table-bordered text-center ">
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">รหัส</th>
                    <th scope="col">วันที่ขอเบิก</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ชื่ออุปกรณ์</th>
                    <th scope="col">จำนวนที่เบิก</th>
                    <th scope="col">เบิกโดย</th>
                    <th scope="col">สถานะการอนุมัติ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>2/02/2019</td>
                    <td>บัญชี</td>
                    <td>ปากกา parker</td>
                    <td>3</td>
                    <td>นาย เอ นามสมมุติ</td>
                    <td>อนุมัติ</td>
                  </tr>
                  
                  <tr>
                    <th scope="row">1</th>
                    <td>2/02/2019</td>
                    <td>บัญชี</td>
                    <td>ปากกา parker</td>
                    <td>6</td>
                    <td>นาย บี นามสมมุติ</td>
                    <td>อนุมัติ</td>
                  </tr>
                  
                </tbody>
              </table>

              </div>
            </div>
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

    });
  </script>

</body>

</html>