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
    <style>
    .tab-pane{
        margin-top:15px;
    }
    td{
        background-color:white;
        color:gray;
    }
    </style>
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
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'slidebar.php'?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
            if(isset($_GET['msg'])){
                echo  '<script >alert("'.$_GET['msg'].'");</script>';
            }
        ?>

        <!-- Main Begin Page Content -->
        <div class="container-fluid" style="margin-top: 15px;">
            
        <h1 style="text-align: center;" class="text-primary">Master Data</h1>
                
            
          <!-- Page Heading -->
         
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-sta_type" data-toggle="tab" href="#sta_type" role="tab" aria-controls="nav-home" aria-selected="true">ประเภทอุปกรณ์</a>
                <a class="nav-item nav-link" id="nav-brand_type" data-toggle="tab" href="#brand_type" role="tab" aria-controls="nav-home" aria-selected="true">ยี่ห้อ</a>
                <a class="nav-item nav-link" id="nav-unit_type" data-toggle="tab" href="#unit_type" role="tab" aria-controls="nav-profile" aria-selected="false">หน่วยนับ</a>
                
                <a class="nav-item nav-link" id="nav-color_type" data-toggle="tab" href="#color_type" role="tab" aria-controls="nav-contact" aria-selected="false">สีอุปกรณ์</a>
                <a class="nav-item nav-link" id="nav-auth_type" data-toggle="tab" href="#auth_type" role="tab" aria-controls="nav-contact" aria-selected="false">สิทธิ์</a>
                <a class="nav-item nav-link" id="nav-dept_type" data-toggle="tab" href="#dept_type" role="tab" aria-controls="nav-profile" aria-selected="false">แผนก</a>
                <a class="nav-item nav-link" id="nav-status_type" data-toggle="tab" href="#status_type" role="tab" aria-controls="nav-contact" aria-selected="false">สถานะการเบิก</a>
            </div>
            </nav>
            <div class="tab-content col-md-6" id="nav-tabContent">
                <div class="tab-pane fade sta_type show" id="sta_type" role="tabpanel" aria-labelledby="nav-home-tab">
                            
                </div>
                <div class="tab-pane fade unit_type" id="unit_type" role="tabpanel" aria-labelledby="nav-profile-tab">
                           
                </div>
                <div class="tab-pane fade auth_type" id="auth_type" role="tabpanel" aria-labelledby="nav-contact-tab">
                            
                </div>
                <div class="tab-pane fade  brand_type" id="brand_type" role="tabpanel" aria-labelledby="nav-home-tab">
                           
                </div>
                <div class="tab-pane fade dept_type" id="dept_type" role="tabpanel" aria-labelledby="nav-profile-tab">
                           
                </div>
                <div class="tab-pane fade status_type" id="status_type" role="tabpanel" aria-labelledby="nav-contact-tab">
                            
                </div>
                <div class="tab-pane fade color_type" id="color_type" role="tabpanel" aria-labelledby="nav-contact-tab">
                            
                </div>
            </div>
          
    

        
            

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
    
     
      

    </div><!-- End of Content Wrapper -->


  </div><!-- End of Page Wrapper -->

     <!-- Modal add stationary type-->
    <div class="modal fade" id="addSta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มประเภทอุปกรณ์</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/type/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="type_name"  style="margin-right:10px;">ประเภทอุปกรณ์</label>
                          <input type="text" name="type_name" class="form-control" id="type_name" value="" >
                        </div>
                        <div class="col-md-4 form-group">
                          <label for="type_code"  style="margin-right:10px;">นำหน้ารหัสอุปกรณ์</label>
                          <input type="text" name="type_code" class="form-control " id="type_code" value="" >
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6" >
                            <button type="submit"  class="btn btn-primary">เพิ่มประเภทอุปกรณ์</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

     <!-- Modal add Department type-->
     <div class="modal fade" id="addDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/department/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="dept_name"  style="margin-right:10px;">แผนก</label>
                          <input type="text" name="dept_name" class="form-control" id="dept_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;margin-top:32px;">
                                <button type="submit"  class="btn btn-primary">เพิ่มแผนก</button>
                        </div>
                    </div>
                    
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal add Unit type-->
    <div class="modal fade" id="addUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/unit/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="unit_name"  style="margin-right:10px;">หน่วยนับ</label>
                          <input type="text" name="unit_name" class="form-control" id="unit_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มหน่วยนับ</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal add color type-->
    <div class="modal fade" id="addColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มสี</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/color/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="color_name"  style="margin-right:10px;">ชื่อสี</label>
                          <input type="text" name="color_name" class="form-control" id="color_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มสี</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal add Brand type-->
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มยี่ห้อ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/brand/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="brand_name"  style="margin-right:10px;">ยี่ห้อ</label>
                          <input type="text" name="brand_name" class="form-control" id="brand_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มยี่ห้อ</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>
    
     <!-- Modal add auth type-->
    <div class="modal fade" id="addAuth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มสิทธิ์</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/authen/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="auth_name"  style="margin-right:10px;">สิทธิ์</label>
                          <input type="text" name="auth_name" class="form-control" id="auth_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มสิทธิ์</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal add status type-->
    <div class="modal fade" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มสถานะการเบิก</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/status_type/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="status_name"  style="margin-right:10px;">สถานะการเบิก</label>
                          <input type="text" name="status_name" class="form-control" id="status_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มสถานะการเบิก</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal tran type-->
    <div class="modal fade" id="addTranType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มการเพิ่ม/ถอน</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="api/tran_type/create.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="tran_name"  style="margin-right:10px;">เพิ่มถอน</label>
                          <input type="text" name="auth_name" class="form-control" id="tran_name" value="" >
                        </div>
                        <div class="col-md-6" style="padding-left:0;">
                            <button type="submit" style="margin-top:32px" class="btn btn-primary">เพิ่มสถานะการเบิก</button>
                        </div>
                    </div>
                </form>
            </div>
           
        </div>
        </div>
    </div>

    <!-- Modal edit type-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="titleEditModal">แก้ไขประเภทอุปกรณ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="" id="editForm" method="post">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="type_name" id="lableName" style="margin-right:10px;"></label>
                                <input type="text" id="editName" name="name" class="form-control" id="type_name" value="" >
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="type_code" id="lableCode" style="margin-right:10px;">นำหน้ารหัสอุปกรณ์</label>
                                <input type="text" id="editCode" name="code" class="form-control "  value="" >
                            </div>
                            <div class="form-group">
                                <input type="text" id="editID" name="id" class="form-control "  value="" hidden>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6" >
                                <button type="submit"  class="btn btn-primary">แก้ไข</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
            </div>
        </div>
  
     <!-- Modal delete type-->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="titleDeleteModal">ยืนยันการลบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form action="" id="deleteForm" method="post">
                            <div class="form-group">
                                <input type="text" id="deleteID" name="id" class="form-control "  value="" hidden>
                            </div>
                            <div class="col-md-6" >
                                <button type="submit"  class="btn btn-danger">ยืนยันการลบ</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

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

  <!-- MyScript -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/showStationaryType.js"></script>
  <script src="js/showDepartmentType.js"></script>          
  <script src="js/showUnitType.js"></script> 
  <script src="js/showColorType.js"></script> 
  <script src="js/showBrandType.js"></script> 
  <script src="js/showAuthType.js"></script> 
  <script src="js/showStatusType.js"></script> 
  <script src="js/showTranType.js"></script> 
  <script id="myScript">
      $(document).ready(function () {
        showStationaryType();
        showDepartmentType();
        showUnitType();
        showColorType();
        showBrandType();
        showAuthType();
        showStatusType();
        showTranType();
        activeTab()
      });

      function activeTab(){
        var tabname = '<?php echo $_GET["active"]; ?>';
        console.log(tabname);
        $( "#"+tabname ).addClass( "show" );
        $( "#"+tabname   ).addClass( "active" );
        $( "#nav-"+tabname   ).addClass( "active" );
      }

      function editSta(id){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/type/update.php');
        $("#titleEditModal").html('แก้ไขประเภทอุปกรณ์');
        $("#lableName").html('ชื่ออุปกรณ์');
        $("#lableCode").html('นำหน้ารหัส');
        $("#lableCode").show();
        $("#editCode").show();
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
                if(this.cellIndex == 2){
                    $("#editCode").val($(this).text());
                }

                 //alert( 'index ' + this.cellIndex + ': ' + $(this).text() );
            });
        });
        
           
       
      }

      function deleteSta(id){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/type/delete.php');
        $('#deleteID').val(id);
      }
  
      
      function editBrand(id){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/brand/update.php');
        $("#titleEditModal").html('แก้ไขยี่ห้ออุปกรณ์');
        $("#lableName").html('ยี่ห้อ');
        $("#lableCode").hide();
        $("#editCode").hide();
        
        
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                    console.log($("#editID").val());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
            });
        });
         
      }
  
      function deleteBrand(id){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/brand/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }

      function editUnit(){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/unit/update.php');
        $("#titleEditModal").html('แก้ไขหน่วยอุปกรณ์');
        $("#lableName").html('หน่วย');
        $("#lableCode").hide();
        $("#editCode").hide();
        
        
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                    console.log($("#editID").val());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
            });
        });
         
      }

      function deleteUnit(id){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/unit/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }

      function editColor(){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/color/update.php');
        $("#titleEditModal").html('แก้ไขสีอุปกรณ์');
        $("#lableName").html('สี');
        $("#lableCode").hide();
        $("#editCode").hide();
        
        
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                    console.log($("#editID").val());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
            });
        });
         
      }

      function deleteColor(id){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/color/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }

      function editAuth(){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/authen/update.php');
        $("#titleEditModal").html('แก้ไขสิทธิ์');
        $("#lableName").html('สี');
        $("#lableCode").hide();
        $("#editCode").hide();
        
        
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                    console.log($("#editID").val());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
            });
        });
         
      }

      function deleteAuth(id){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/authen/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }

      function editDept(id){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/department/update.php');
        $("#titleEditModal").html('แก้ไขแผนก');
        $("#lableName").html('ชื่อแผนก');
        $("#lableCode").html('นำหน้ารหัส');
        $("#lableCode").hide();
        $("#editCode").hide();
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                $("#editID").val($(this).text());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
                if(this.cellIndex == 2){
                    $("#editCode").val($(this).text());
                }

                 //alert( 'index ' + this.cellIndex + ': ' + $(this).text() );
            });
        });
      }

      function deleteDept(){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/department/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }

      function editStatus(){
        $('#editForm').attr('action', 'http://localhost/stationarySystem/api/status_type/update.php');
        $("#titleEditModal").html('แก้ไขสถานะ');
        $("#lableName").html('สถานะ');
        $("#lableCode").hide();
        $("#editCode").hide();
        
        
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $("#editID").val($(this).text());
                    console.log($("#editID").val());
                }
                if(this.cellIndex == 1){
                    $("#editName").val($(this).text());
                }
            });
        });
         
      }

      function deleteStatus(){
        $('#deleteForm').attr('action', 'http://localhost/stationarySystem/api/status_type/delete.php');
        $(".dropdown").click(function() {
            $(this).parent().siblings().each(function() {
                if(this.cellIndex == 0){
                    $('#deleteID').val($(this).text());
                }
            });
        });
      }
  </script>

</body>

</html>