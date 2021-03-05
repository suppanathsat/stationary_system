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

  
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

       <div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h5 class="m-0 font-weight-bold text-white ">เพิ่มพนักงาน</h5>
              
            </div>
            <div class="card-body">
            <form>
                <div class="row">
                    <div class="form-group col-md-3">
                      <label for="exampleFormControlSelect1">สิทธิการเข้าถึง</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>พนักงาน</option>
                        <option>แอดมินแผนก</option>
                        <option>แอดมินระบบ</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="user_id">เลขที่พนักงาน</label>
                        <input type="text" name="user_id" class="form-control" id="user_id"  placeholder="staff id">
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="password">รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control" id="password"  placeholder="password">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password2">ยืนยันรหัสผ่าน</label>
                        <input type="password" name="password2" class="form-control" id="password2"  placeholder="confirm password">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="fname">ชื่อจริง</label>
                        <input type="text" name="fname" class="form-control" id="fname"  placeholder="first name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="lname">นามสกุล</label>
                        <input type="text" name="lname" class="form-control" id="lname"  placeholder="last name">
                    </div>
                </div>
                <button type="button" onclick="create()" class="btn btn-success" style="width: 120px;">ยืนยัน</button>
            </form>
            </div>
        </div>
            <h1 style="color: orange;"></h1>
            
            
            <div id="result"></div>
        
      <script>
       
         
          function create(){
            var dataToBeSent = $("form").serialize();
            var url = 'api/user/create.php'
            var posting = $.post(url, dataToBeSent);

            posting.done(function( data ) {
             alert(data);
             $('.form-control').val('');
            });
          }
      </script>   
         
      

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  

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

   <script>
     
   </script>
</body>

</html>
