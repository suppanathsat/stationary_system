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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  

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
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">เพิ่มอุปกรณ์</h5>
            </div>
            <div class="card-body">
            <form action="api/stationary/create.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sta_img">เลือกรูปภาพ</label>
                    <input type="file" name="image" class="form-control-file" id="sta_img" style="border:orange 1px solid">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="departmant">แผนก</label>
                    <select class="form-control" name="dept_id" id="department">
                    
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="type">ประเภท</label>
                    <select class="form-control" name="type_id" id="type">
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="sta_name">ชื่ออุปกรณ์</label>
                    <input type="text" class="form-control" name="sta_name" id="sta_name" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="price">ราคา/หน่วย</label>
                    <input type="text" class="form-control" name="sta_price"  id="price" aria-describedby="emailHelp" placeholder="0.00">
                </div>
                <div class="form-group col-md-2">
                    <label for="sta_stock">จำนวนของในสต๊อค</label>
                    <input type="number" name="inStock" min="0" value="0" style="text-align:center" class="form-control" id="sta_name" aria-describedby="emailHelp" placeholder="">
                </div>
            </div>
            <button type="submit"  class="btn btn-primary" style="width:130px">ยืนยัน</button>

        </form>
            </div>
        </div>

        <h1 style="color:orange"></h1>
        
          
       
            
        
        
      </div>
      <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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

   
   <!-- Page level custom scripts -->
   <script src="js/showType.js"></script>
   <script src="js/showDepartment.js"></script>
   <script>
    $(document).ready(function(){
    
      // show list of product on first load
      showType()
      showDepartment()
    });
  </script>
  
</body>

</html>
