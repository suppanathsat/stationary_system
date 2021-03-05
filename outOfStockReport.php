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
              <h5 class="m-0 font-weight-bold text-white ">รายงานอุปกรณ์ที่หมดสต๊อค</h5>

            </div>
            <div class="card-body">
              <p><a class="btn btn-danger" style="margin:15px;" href="pdfSample.php" role="button"><i class="far fa-file-pdf fa-lg" style="margin-right: 5px;"></i>PDF</a>รายงาน : อุปกรณ์ที่หมดสต๊อค ประจำเดือน กุมภาพันธ์ 2562 </p>
              
              <table class="table table-bordered text-center ">
                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">รหัส</th>
                    <th scope="col">แผนก</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">ชื่ออุปกรณ์</th>
                    <th scope="col">ราคาต่อหน่วย</th>
                    <th scope="col">จำนวนในสต็อค</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <th scope="row">2</th>
                    <td>บัญชี</td>
                    <td>เครื่องเขียน</td>
                    <td>กระดาษถนอมสายตา 1 รีม</td>
                    <td>400</td>
                    <td>0</td>
                  </tr>
                  
                  <tr>
                    <th scope="row">4</th>
                    <td>ไอที</td>
                    <td>อุปกรณ์สำนักงาน</td>
                    <td>คอมพิวเตอร์</td>
                    <td>6000</td>
                    <td>0</td>
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