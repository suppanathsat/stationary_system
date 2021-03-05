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
              <h5 class="m-0 font-weight-bold text-white ">Staff Table</h5>

            </div>
            <div class="card-body">

              <div class="row">
                
               
                <div class="form-group col-md-4" style="margin-top: 31px;">
                  <div class="input-group">

                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary dropdown-toggle" style="border-color: darkgray;" id="searchBy" value="fname"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ชื่อพนักงาน</button>
                      <div class="dropdown-menu">
                        <option class="dropdown-item" onclick="searchStaByStaID()" href="#">รหัสพนักงาน</option>
                        <option class="dropdown-item" onclick="searchStaByStaName()" href="#">ชื่อพนักงาน</option>
                      </div>
                    </div>
                    <input type="text" class="form-control" id="search" aria-label="Text input with dropdown button"
                      placeholder="ค้นหา">
                  </div>
                </div>
                <div class="col-md-3">
                    <?php
                        if($_SESSION['auth_id']==2){
                          echo '<button type="button" style="margin-top:30px" class="btn btn-success" data-toggle="modal" data-target="#addStaff">';
                            echo '+เพิ่มพนักงาน';
                          echo  '</button>';
                        }
                    ?>
                </div>
              </div>

              <!-- stationary table -->
              <div class="table-responsive" id="staff">

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
      <!-- Modal add staff -->
      <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="">เพิ่มพนักงาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="container">
                <form action="api/staff/create.php" method="POST">
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                        <input type="text" name="createBy" class="form-control" id="createBy" value="<?php echo $_SESSION['fullname'];?>" readonly>
                      </div>
                    </div>
                    <div class="row" >
                      <div class="col-md-4">
                          <label for="fname">username</label>
                          <input type="text" name="username" class="form-control" id="username"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">password</label>
                          <input type="password" name="password1" class="form-control" id="password1"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">confirm password</label>
                          <input type="password" name="password2" class="form-control" id="password2"  >
                      </div>
                    </div>
                    <div class="row" style="margin-top:10px">
                      <div class="form-group col-md-3">
                        <label for="type">แผนก</label>
                        <select class="form-control department" id="" name="dept_id">
                        </select>
                      </div>
                      <div class="col-md-3">
                          <label for="auth">สิทธิ์</label>
                          <select class="form-control auth" id="" name="auth_id">
                          </select> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <label for="fname">ชื่อจริง</label>
                          <input type="text" name="fname" class="form-control" id="fname"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">นามสกุล</label>
                          <input type="text" name="lname" class="form-control" id="lname"  >
                      </div>
                    </div>
                    
                
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">เพิ่มพนักงาน</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal delete staff -->
      <div class="modal fade" id="deletestaff" tabindex="-1" role="dialog" aria-labelledby="deletestaff" aria-hidden="true">
        <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title" id="deleteTtitle">ลบพนักงาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="api/staff/delete.php" method="post">
                <div class="container">
                   <h5 style="margin-top:20px;margin-bottom:20px;">กดตกลงเพื่อยืนยันการลบพนักงาน</h5> 
                    <input type="text" name="staff_id" value="" id="deleteButt" hidden>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger">ตกลง</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
              </form>
            </div>
        </div>
      </div>

     
      

    </div><!-- End of Content Wrapper -->


  </div><!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Modal edit stationary -->
 <div class="modal fade bd-example-modal-xl" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
    <div class="modal-header bg-warning text-white">
              <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลพนักงาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="container">
            <form action="api/staff/update.php" method="POST">
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="staff_id"  style="margin-right:10px;">ผู้ดำเนินการ</label>
                        <input type="text" name="createBy" class="form-control" id="ecreateBy" value="<?php echo $_SESSION['fullname'];?>" readonly>
                      </div>
                    </div>
                    <div class="row" >
                      <div class="col-md-4">
                          <label for="fname">username</label>
                          <input type="text" name="username" class="form-control" id="eusername"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">password</label>
                          <input type="password" name="password1" class="form-control" id="epassword1"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">confirm password</label>
                          <input type="password" name="password2" class="form-control" id="epassword2"  >
                      </div>
                    </div>
                    <div class="row" style="margin-top:10px">
                      <div class="form-group col-md-3">
                        <label for="type">แผนก</label>
                        <select class="form-control department"  name="dept_id">
                          <option id="edept_id"></option>
                        </select>
                      </div>
                      <div class="col-md-3">
                          <label for="auth">สิทธิ์</label>
                          <select class="form-control auth"  name="auth_id">
                            <option id="eauth_id"></option>
                          </select> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <label for="fname">ชื่อจริง</label>
                          <input type="text" name="fname" class="form-control" id="efname"  >
                      </div>
                      <div class="col-md-4">
                          <label for="lname">นามสกุล</label>
                          <input type="text" name="lname" class="form-control" id="elname"  >
                      </div>
                    </div>
                      
                    <input type="text" name="staff_id" class="form-control" id="estaff_id"  hidden>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">แก้ไขพนักงาน</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </form>
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

  <script src="js/showDepartment.js"></script>
  <script src="js/showAuth.js"></script>
  
  <script id="myScript">
    $(document).ready(function () {
        showDepartment();
        showStaff();
        showAuth();

        $( ".department" ).change(function() {
        var dept_id = $(".department").val();
        var search = $('#search').val();
        var searchBy = $('#searchBy').val();
        searchStaff(dept_id,search,searchBy);
      });

      $("#search").keyup(function(){
        var type_id = $(".type").val();
        var search = $('#search').val();
        var searchBy = $('#searchBy').val();
        searchStaff(type_id,search,searchBy);
      });

      

      
    });

    function searchStaByStaName(){
          $('#searchBy').html('ชื่อพนักงาน');
          $('#searchBy').val('fname');

          var dept_id = $(".department").val();
          var search = $('#search').val();
          var searchBy = $('#searchBy').val();
          searchStaff(type_id,search,searchBy);
      }
    
      function searchStaByStaID(){
        $('#searchBy').html('รหัสพนักงาน');
        $('#searchBy').val('staff_id');

        var type_id = $(".department").val();
        var search = $('#search').val();
        var searchBy = $('#searchBy').val();
        searchStatff(type_id,search,searchBy);
      }


    function clickDeleteButton(sta_id){
      $('#deleteTtitle').html('ลบพนักงาน( รหัสพนักงาน '+sta_id+')');
      $('#deleteButt').val(sta_id);
      $('#deletestaff').modal('show');
      
    }

    function clickEditButton(staff_id){
      
      $('#editStaff').modal('show');
      showEditStaff(staff_id);
    }

    function showEditStaff(staff_id){
      $.getJSON("http://localhost/stationarySystem/api/staff/readOne.php?staff_id="+staff_id, function(data){
          $.each(data.records, function(key, val) {
            $('#estaff_id').val(val.staff_id);
            $('#edept_id').val(val.dept_id);
            $('#edept_id').html(val.dept_name);
            $('#efname').val(val.fname);
            $('#elname').val(val.lname);
            $('#eusername').val(val.username);
            $('#epassword1').val(val.password);
            $('#epassword2').val(val.password);
            $('#eauth_id').val(val.auth_id);
            $('#eauth_id').html(val.auth_name);
          });
      });
    }

    function searchStaff(dept_id,search,searchBy){
        sta = $.getJSON("http://localhost/stationarySystem/api/staff/search.php?dept_id="+dept_id+"&search="+search+"&searchBy="+searchBy, function(data){
        var button ="";
        var admin_button ="";
        var end_button="";

        var read_select_staff = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
            read_select_staff += '<thead><tr class="bg-primary" style="color:white">';
            read_select_staff += '<th>รหัส</th><th>ชื่อ</th><th>แผนก</th><th>สิทธิ์การเข้าถึง</th><th></th></tr></thead><tbody>';
    
        $.each(data.records, function(key, val) {
          
          button = '<td>';
          admin_button = '<button type="button" style="margin-left:5px;margin-right:5px;" onclick="clickEditButton('+val.staff_id+')" class="btn btn-outline-primary">แก้ไข</button>';
          admin_button += '<button type="button" value="'+val.staff_id+'"  class="btn btn-outline-danger deleteBut" onclick="clickDeleteButton('+val.staff_id+')" >ลบ</button>';
          end_button = '</td>';
            read_select_staff += "<tr class='starow'  value='"+val.staff_id+"'>";
            read_select_staff +=  "<td>"+val.username+"</td>";
            read_select_staff +=  "<td>"+val.fname+" "+val.lname+"</td>";
            read_select_staff +=  "<td>"+val.dept_name+"</td>";
            read_select_staff +=  "<td>"+val.auth_name+"</td>";
            //สำหรับปุ่ม เบิก/ลบ/แก้ไข
            read_select_staff += button;
            
            <?php
           
            if($_SESSION['auth_id']==2){
              echo "read_select_staff += admin_button;";
            }
            ?>
            read_select_staff += end_button;
            //แทคปิดแถว
            read_select_staff +=  "</tr>";
          
        });
        
        read_select_staff += "</tbody></table>"
        console.log(read_select_staff);
        $("#staff").html(read_select_staff);
      });  

      }

    function showStaff(){
    var read_select_sta = '<table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" style="text-align: center;">';
    read_select_sta += '<thead><tr class="bg-primary" style="color:white">';
    read_select_sta += '<th>รหัส</th><th>ชื่อ</th><th>แผนก</th><th>สิทธิ์การเข้าถึง</th><th></th></tr></thead><tbody>';
    
    
    var sta = $.getJSON("http://localhost/stationarySystem/api/staff/read.php", function(data){
        var button ="";
        var admin_button ="";
        var end_button="";
        
        $.each(data.records, function(key, val) {
          button = '<td>';
          admin_button = '<button type="button" style="margin-left:5px;margin-right:5px;" onclick="clickEditButton('+val.staff_id+')" class="btn btn-outline-primary">แก้ไข</button>';
          admin_button += '<button type="button" value="'+val.staff_id+'"  class="btn btn-outline-danger deleteBut" onclick="clickDeleteButton('+val.staff_id+')" >ลบ</button>';
          end_button = '</td>';
            read_select_sta += "<tr class='starow'  value='"+val.staff_id+"'>";
            read_select_sta +=  "<td>"+val.username+"</td>";
            read_select_sta +=  "<td>"+val.fname+" "+val.lname+"</td>";
            read_select_sta +=  "<td>"+val.dept_name+"</td>";
            read_select_sta +=  "<td>"+val.auth_name+"</td>";
            //สำหรับปุ่ม เบิก/ลบ/แก้ไข
            read_select_sta += button;
            <?php
           
            if($_SESSION['auth_id']==2){
              echo "read_select_sta += admin_button;";
            }
            ?>
            read_select_sta += end_button;
            //แทคปิดแถว
            read_select_sta +=  "</tr>";
          
        });
        
        read_select_sta += "</tbody></table>"
        $("#staff").html(read_select_sta);
      });  

      }//showStationary
  </script>

</body>

</html>